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

    $result = false;

    $_POST = json_decode(file_get_contents('php://input'), true);

    $id = $_POST['gameID'];
    $password = $_POST['password'];

    $game = Game::Where('place_id', $id)->get();

    if( $game ){
        $game = $game->where('password',$password)->get();
        if( $game ){
            return response("Game authorized.")->header('Content-Type', 'text-plain');
        }else{
            return response("Invalid password.")->header('Content-Type', 'text-plain');
        }
    }else{
        return respone("No game found.")->header('Content-Type', 'text-plain');
    }

    if($result){
        return true;
    }else{
        return false;
    }

});
