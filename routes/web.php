<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/checkGameAuth', function() {

    $result = false;

    $id = $_POST['gameID'];
    $password = $_POST['password'];

    $game = Game::Where('game_id', $id)->first();

    if( $game ){
        $game = Game::where('password', $password)->first();
        if( $game ){
            return "Game authorized.";
        }else{
            return "Invalid password.";
        }
    }else{
        return "No game found.";
    }

    if($result){
        return true;
    }else{
        return false;
    }

});
