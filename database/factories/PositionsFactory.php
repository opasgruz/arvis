<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Positions;
use Faker\Generator as Faker;

$factory->define(Positions::class, function (Faker $faker) {

    return [
        'type' => $faker->word,
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
