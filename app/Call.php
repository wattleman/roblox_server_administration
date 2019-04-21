<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ["id", "place_id", "server_id", "caller", "reported_user", "call_details", "created_at", "updated_at"];
}
