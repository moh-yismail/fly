<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Reservation extends Controller
{
    //
    public function cancel(Request $request) {
        $id = $request->query('id');
        $reserve = \App\Reservation::where('id', $id)
            ->first();
        if (!$reserve) {
            return response('No reservation found', 401);
        }
        $reserve->state = '0';
        $reserve->save();
        return response('reservation canceled', 200);
    }

    public function show(Request $request) {
        $time = (int)$request->query('time');
        $reserves = \App\Reservation::all()->where('state', '0');
        if (!$reserves) {
            return [];
        }
        $result = [];

        $now = Carbon::now();
        foreach ($reserves as $reserve) {
            $reserve_time = Carbon::parse($reserve->date);
            if($now->diffInHours($reserve_time)< $time) {
                array_push($result, $reserve);
            }
            //if() need to subtract time and read total hours
        }
        return $result;

    }

    public function getAllByEmail(Request $request) {
        $email = $request->query('email');
        $user = User::where('email', $email)->first();
        if (!$user) {
            return response('No email found', 401);
        }

        $reservation = \App\Reservation::all()->where('user_id', $user->id);
        return $reservation->toJson();
    }
}
