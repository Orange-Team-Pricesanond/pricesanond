<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tb_client;
use Faker\Generator as Faker;

$factory->define(tb_client::class, function (Faker $faker) {
    return [
        'ct_fn' => $faker->name,
        'ct_inn' => $faker->sentence(),
        'ct_tax' => $faker->randomNumber(),
        'ct_images' => $faker->randomNumber(),        
    ];
});
