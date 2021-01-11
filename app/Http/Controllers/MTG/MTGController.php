<?php

namespace App\Http\Controllers\MTG;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AllDecks;
//-----------------------------------
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
//---------------------------------
use GuzzleHttp\Client;


class MTGController extends Controller
{
    protected $table;

    protected $client;

    public function __construct()
    {
        $this->middleware('auth');

        $this->table = new AllDecks();

        $this->client = new Client();

    }

    public function index(){

        return view( 'mtg.create' );
    }

    public function create( Request $request ){

       
        $deck = json_decode( $request->deck );

        $side = json_decode( $request->side );

        $lands = json_decode( $request->lands );

        foreach( $deck as $index => $card ):

            if( $card->name == $request->portrait ){

               $obj_card = json_decode($this->client->get( $card->uri )->getBody());
            }

        endforeach;
        
        $deck_name = str_replace( ' ', '-', $request->name );

        $public = empty( $request->public ) ? false : true;

        $comments = empty( $request->comments ) ? false : true;        
         
        $deck_exist = $this->table->where( 'name', $deck_name )->first();
       
        $deck_name = empty( $deck_exist ) ? $deck_name : $deck_name.'-'.date( 'd-m-Y' ); 
                   
        DB::table( 'all_decks' )->insertGetId(
            [
                'name' =>  $deck_name,
                'user_id' => Auth::id(),
                'author' => Auth::user()->name,
                'public' => $public,
                'comments' => $comments,
                'img_url' => $obj_card->image_uris->png                 
            ]                
        );
       
        
           
        Schema::create( $deck_name, function( Blueprint $table ){

            $table->id();                                                  
            $table->string( 'card_name' ); 
            $table->enum( 'card_type', [ 'land', 'deck', 'side' ] );  
            $table->string( 'card_url' );    
            $table->smallInteger( 'qty' );        
            
        });

        $this->fillDeck( $deck_name, $deck, 'deck' );

        $this->fillDeck( $deck_name, $side, 'side' );

        $this->fillDeck( $deck_name, $lands, 'land' );


        if( $comments ){

            Schema::create( $deck_name.'_comments', function( Blueprint $table ){

                $table->id();   
                $table->foreignId( 'user_id' );                                               
                $table->string( 'user_name' ); 
                $table->text( 'comment' ) ;           
                
            });

        }    

        return redirect()->route('deck_manager');

               
    }

    public function testTable( string $name ){

        if( !Schema::hasTable( $name ) || empty( $name ) ){

            return redirect()->route( 'deck_manager' );
        }
       

        $deck = DB::table( $name )->get();

        $testeable_deck = array();

        foreach( $deck as $index => $card ): 

            $response = $this->client->get( $card->card_url );

            $result = json_decode( $response->getBody() );

            $card->img_uri = $result->image_uris->normal;

            $card->text = $result->oracle_text;
          
            for( $i=0; $i < intval( $card->qty ); $i++ ){

                array_push( $testeable_deck, $card );
            }
           
        endforeach;
        
        return view( 'mtg.testtable', [ 'deck' => $testeable_deck ] );
        
    }

    public function deckList(){
        
       $all_decks = DB::table( 'all_decks' )->where( 'user_id', Auth::id() )->get();

       return view( 'mtg.deck_list', [ 'all_decks' => $all_decks ] );
    }

    protected function fillDeck( String $deck_name, $deck, String $type ){

        foreach( (array )$deck as $index => $card ):
           
            DB::table( $deck_name )->insertGetId(
                [
                    
                    'card_name' =>  $card->name,
                    'card_type' => $type,
                    'card_url' => $card->uri,
                    'qty' => intval($card->quantity)
                ]                
            );

        endforeach;

        

    }


}
