<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    //
    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function flights() {
        return $this->hasMany(Flight::class);
    }
}
