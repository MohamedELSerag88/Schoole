<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Schoole;
use App\Models\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $schoole_ids = Schoole::all()->pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'age' =>  $faker->numberBetween(12, 18),
        'grade' => $faker->numberBetween(1, 9),
        'schoole_id' => $faker->randomElement($schoole_ids)
    ];
});
