<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Topic::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'content' => $faker->text(),
        'user_id' => \App\Models\User::where("role", \App\Models\User::STUDENT)->get()->random()->id,
        'course_id' => \App\Models\Course::all()->random()->id,
        'created_at' => now()
    ];
});
