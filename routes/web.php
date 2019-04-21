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

Route::post('/game/checkAuth', 'ROBLOX_Requests\GameController@checkAuth')->name('roblox.requests.game.checkAuth');
Route::post('/game/createCall', 'ROBLOX_Requests\CallsController@createCall')->name('roblox.requests.calls.create');
