<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function flights() {
        return $this->belongsTo(Flight::class, 'flight_id');
    }
}
