<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public function flightClasses() {
        return $this->belongsToMany(FlightClass::class);
    }

    public function plane() {
        return $this->belongsTo(Plane::class);
    }

    public function fromAirPort() {
        return $this->belongsTo(AirPort::class, 'from_air_port');
    }
    public function toAirPort() {
        return $this->belongsTo(AirPort::class, 'to_air_port');
    }
}
