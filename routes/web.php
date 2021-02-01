<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MTG\MTGController;
use App\Http\Controllers\MTG\Printer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/logout', function(){
    Auth::logout();
    return view('welcome');
})->name( 'logout' );

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get( '/create_deck', [ MTGController::class, 'index' ] )->name( 'create_deck' );

Route::post( '/save_deck', [ MTGController::class, 'create' ] )->name( 'save_deck' );

Route::get( '/deck_list', [ MTGController::class, 'deckList' ] )->name( 'deck_manager');

Route::get( '/test_deck/{name}', [ MTGController::class, 'testTable' ] )->name( 'tester' );

Route::get( '/print/{id}', [ Printer::class, 'print' ] )->name( 'print' );

