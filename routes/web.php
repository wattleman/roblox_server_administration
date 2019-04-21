<?php

use App\Game;
use Symfony\Component\HttpFoundation\Response;

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

    $_POST = json_decode(file_get_contents('php://input'), true);

    $id = $_POST['gameID'];
    $password = $_POST['password'];

    //$game = Game::Where('place_id', $id)->first();

    /*Method to define if game exists and password is correct or not.
    if( $game ){
        $game = $game->where('password',$password)->first();
        if( $game ){
            return response("Game authorized.")->header('Content-Type', 'text-plain');
        }else{
            return response("Invalid password.")->header('Content-Type', 'text-plain');
        }
    }else{
        return response("Game not found.")->header('Content-Type', 'text-plain');
    }
    */

    /*Method to just desplay if authorized or not. Will respond with invalid credientials if wrong password or gameID
        Prevents people from pinging games to check if they have services installed.
    */
    // if( $game ){
    //     $game = $game->where('place_id', $id)->where('password',$password)->first();
    //     if( $game && $game->active == 1){
    //         return response("Game authorized.")->header('Content-Type', 'text-plain');
    //     }else{
    //     return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
    // }
    // }else{
    //     return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
    // }

    $game = Game::Where('place_id', $id)->where('password',$password)->first();
    if($game && ($game->active == 1)){
        return response("Game authorized.", 3)->header('Content-Type', 'text-plain');
    }else{
        return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
    }

});
