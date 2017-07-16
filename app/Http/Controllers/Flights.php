<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class Flights extends Controller
{
    //
    public function create(Request $request)
    {
        //
        $flight = new Flight();
        $flight->plane_id = $request->plane_id;
        $flight->from_air_port = $request->from_air_port;
        $flight->to_air_port = $request->to_air_port;
        $flight->to_air_port = $request->to_air_port;
        $flight->title = $request->title;
        $flight->lift = $request->lift;
        $flight->land = $request->land;
        $flight->save;

    }

    public function show(Request $request)
    {
        $from_air_port = $request->from_air_port;
        $to_air_port = $request->to_air_port;
        //
        $from_air = \App\AirPort::where('name', $from_air_port)->first();
        $to_air = \App\AirPort::where('name', $to_air_port)->first();
        if(!$from_air) {
            return response('from air port not exist', 401);
        }
        if(!$to_air) {
            return response('to air port not exist', 401);
        }

        $lift = $request->lift;
        $flights = Flight::all()
            ->where('from_air_port', $from_air->id)
            ->where('to_air_port', $to_air->id)
            ->where($lift, 'lift');
        return $flights;

    }



}
