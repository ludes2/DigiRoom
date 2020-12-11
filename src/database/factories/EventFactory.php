<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(Event::class, function (Faker $faker) {

    $startingDate = $faker->dateTimeBetween('+0 days', '+3 month');

    $ts = $startingDate->getTimestamp();
    $s = (15 * 60);
    $remainder = $ts % $s;
    if ($remainder > 0) {
        $startingDate->setTimestamp($ts + $s - $remainder);
    }
    $startingDateClone = clone $startingDate;
    
    $endingDate = $faker->dateTimeBetween($startingDate, $startingDateClone->modify('+4 hours'));
    $ts_end = $endingDate->getTimestamp();
    $s_end = (15 * 60);
    $remainder_end = $ts_end % $s_end;

    if ($remainder_end > 0) {
        $endingDate->setTimestamp($ts_end + $s_end - $remainder_end);
    }

    return [
        'title'     => $faker->sentence,
        'start'     => $startingDate,
        'end'       => $endingDate,
        'type'      => 'single',
        'properties'    => '',
        'description'   => $faker->paragraph,
        'room_id'       => 1,
        'user_id'       => 1
    ];
});
