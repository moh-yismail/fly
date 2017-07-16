<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirPort extends Model
{
    //
    public function flights() {
        return $this->hasMany(Flight::class);
    }
}
