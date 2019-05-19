<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = ['server_id', 'game_id', 'ip'];

    public function verifyAuth($place_id, $ip_adr){

        $server = Server::where('place_id', $place_id)->where('ip', $ip_adr)->first();

        if($server){
            return true;
        }else{
            return false;
        }

    }

}
