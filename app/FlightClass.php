<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlightClass extends Model
{
    //

    public function flights() {
        return $this->belongsToMany(Flight::class);
    }
}
