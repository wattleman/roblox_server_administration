<?php

namespace App\Http\Controllers\ROBLOX_Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Call;
use App\Game;

class CallsController extends Controller
{
    public function createCall(){
        $_POST = json_decode(file_get_contents('php://input'), true);

        $gameID = $_POST['gameID'];
        $serverID = $_POST['serverID'];
        $password = $_POST['password'];

        $reporting_user = $_POST['reporting_user'];
        $reported_user = $_POST['reported_user'];
        $call_description = $_POST['call_description'];

        if(Game::checkAuth($from = "web",$gameID, $password)){
            $call = new Call;
            $call->place_id = $gameID;
            $call->server_id = $serverID;
            $call->caller = $reporting_user;
            $call->reported_user = $reported_user;
            $call->call_details = $call_description;
            $call->save();

            return response("Call created.")->header('Content-Type', 'text-plain');
        }else{
            return response("Issue creating call.")->header('Content-Type', 'text-plain');
        }
    }
}
