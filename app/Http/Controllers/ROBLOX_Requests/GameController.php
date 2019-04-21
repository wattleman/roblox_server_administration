<?php

namespace App\Http\Controllers\ROBLOX_Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;

class GameController extends Controller
{
    public function checkAuth($from = "roblox", $id, $password){

        if($from == "roblox"){
            $_POST = json_decode(file_get_contents('php://input'), true);
             $id = $_POST['gameID'];
            $password = $_POST['password'];
        }





        $game = Game::Where('place_id', $id)->where('password',$password)->first();
        if($game && ($game->active == 1)){
            return response("Game authorized.")->header('Content-Type', 'text-plain');
        }else{
            return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
        }
    }
}
