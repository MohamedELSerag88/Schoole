<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Schoole;
use Faker\Generator as Faker;

$factory->define(Schoole::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address ,
        'rooms_num'=> $faker->randomDigitNotNull,
        'type'=> $faker->randomElement(['Boyes','girls','Both'])
    ];
});
