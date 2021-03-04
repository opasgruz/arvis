<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Workers;
use Faker\Generator as Faker;

$factory->define(Workers::class, function (Faker $faker) {

    return [
        'filial_id' => $faker->randomDigitNotNull,
        'position_id' => $faker->randomDigitNotNull,
        'firstname' => $faker->word,
        'middlename' => $faker->word,
        'lastname' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
