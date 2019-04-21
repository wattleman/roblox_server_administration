<?php

namespace App\Http\Controllers\ROBLOX_Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;

class GameController extends Controller
{
    public function checkAuth(){
        $game = Game::Where('place_id', $id)->where('password',$password)->first();
        if($game && ($game->active == 1)){
            return response("Game authorized.")->header('Content-Type', 'text-plain');
        }else{
            return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
        }
    }
}
