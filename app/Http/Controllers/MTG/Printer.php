<?php

namespace App\Http\Controllers\MTG;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class Printer extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');       
    }

    public function Print( $id ){

        $deck_name  = DB::table( 'all_decks' )->select( 'name' )->where( 'id', $id )->first();

        $deck = DB::table( strtolower( $deck_name->name ) )->get();


        $data = [
            'title' => 'ONE',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('mtg.printA4', $data);
    
        return $pdf->download('test.pdf');
    }

}
