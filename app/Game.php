<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    public function checkAuth($password){
        if($this->password == $password && ($this->active == 1)){
            return true;
        }else{
            return false;
        }
    }

}
