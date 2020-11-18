<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllDecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'all_decks', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'user_id' );               
            $table->string( 'name' );  
            $table->string( 'author' );
            $table->boolean( 'public' )->default( false );
            $table->boolean( 'comments' )->default( false ); 
            $table->bigInteger( 'rate' )->default( 0 );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_decks');
    }
}
