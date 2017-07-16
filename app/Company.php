<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    public function planes() {
        return $this->hasMany(Plane::class);
    }
}
