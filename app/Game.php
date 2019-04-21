<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function checkAuth($id, $password){
        $game = Game::Where('place_id', $id)->where('password',$password)->first();
        if($game && ($game->active == 1)){
            return response("Game authorized.")->header('Content-Type', 'text-plain');
        }else{
            return response("Game-ID and/or Password is/are incorrect.")->header('Content-Type', 'text-plain');
        }
    }

}
