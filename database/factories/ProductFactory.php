<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'user_id'=>\App\User::all()->random()->id,
        'description'=> $faker->paragraph(),
        'price'=> $faker->numberBetween(1000 , 100000),
        'img'=> $faker->imageUrl(),
    ];
});
