<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resource('airport', 'AirPort', ['only' => [
    'destroy'
]]);

Route::post('flight', 'Flights@create');
Route::get('flight', 'Flights@show');

Route::put('canselRes', 'Reservation@cancel');
Route::get('showCanceld', 'Reservation@show');
Route::get('getAllByEmail', 'Reservation@getAllByEmail');



