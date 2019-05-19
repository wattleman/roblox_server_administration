<?php

namespace App\Http\Controllers\ROBLOX_Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Game;
use App\Server;

class GameController extends Controller
{

    public function verifyGameAuth($place_id, $password){

        $game = Game::Where('place_id', $id)->where('password',$password)->first();

        if($game && $game->acitve == 1){
            return $game;
        }else {
            return false; //Game is not set to active in the DB.
        }

    }

    public function initialize_server(){
        $_POST = json_decode(file_get_contents('php://input'), true);

        $place_id = $_POST['placeID'];
        $password = $_POST['password'];
        $server_id = $_POST['server_id'];
        $ip_adr = $_SERVER['REMOTE_ADDR'];

        $game = verifyGameAuth($place_id, $password);
        if($game != false){

            $game_id = $game->id;

            $new_server = Server::create(['server_id' => $server_id, 'game_id' => $game_id, 'ip' => $ip_adr]);

            return response("[RoCall]: IP-Address Set.")->header('Content-Type', 'text-plain');

        }else{
            return response("[RoCall]: Game not authorized.")->header('Content-Type', 'text-plain');
        }
    }

    public function checkAuth(){


            $_POST = json_decode(file_get_contents('php://input'), true);
         $id = $_POST['placeID'];
            $password = $_POST['password'];






        $game = Game::Where('place_id', $id)->where('password',$password)->first();
        if($game && ($game->active == 1)){
            return response("Game authorized.")->header('Content-Type', 'text-plain');
        }else{
            return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
        }
    }
}
