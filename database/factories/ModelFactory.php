<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\AirPort::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Plane::class, function (Faker\Generator $faker) {
    return [
        'company_id' => \App\Company::all()->random()->id,
        'name' => $faker->name,
        'type' => $faker->name,
    ];
});

$factory->define(App\FlightClass::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'cap' => $faker->numberBetween(1, 100),
        'price' => $faker->numberBetween(10, 200),
        'description' => $faker->text(100),

    ];
});

$factory->define(App\Flight::class, function (Faker\Generator $faker) {
    return [
        'plane_id' => \App\Plane::all()->random()->id,
        'from_air_port' => \App\AirPort::all()->random()->id,
        'to_air_port' => \App\AirPort::all()->random()->id,
        'title' => $faker->text(100),
        'lift' => $faker->dateTime,
        'land' => $faker->dateTime,

    ];
});

$factory->define(App\Reservation::class, function (Faker\Generator $faker) {
    $stat=['active', 'canceled'];

    return [
        'user_id' => \App\User::all()->random()->id,
        'flight_id' => \App\Flight::all()->random()->id,
        'date' => $faker->dateTime,
        'state' => array_rand($stat),
    ];
});
