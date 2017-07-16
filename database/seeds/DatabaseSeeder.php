<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\User::class, 10)->create();
        factory(\App\Company::class, 5)->create();
        factory(\App\Plane::class, 50)->create();
        factory(\App\AirPort::class, 20)->create();
        factory(\App\FlightClass::class, 3)->create();
        factory(\App\Flight::class, 100)->create()->each(function ($flight) {
            $boolean = random_int(0,1);
            $ids = range(1,10);
            shuffle($ids);

            if($boolean) {
                $sliced = array_slice($ids, 0, 2);
                $flight->users()->attach($sliced);
            }
            $boolean = random_int(0,1);
            $ids = range(1,10);
            shuffle($ids);

            if($boolean) {
                $sliced = array_slice($ids, 0, 2);
                $flight->flightClasses()->attach($sliced);
            }
        }
        );
        factory(\App\Reservation::class, 10)->create();
    }
}
