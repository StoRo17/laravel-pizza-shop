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
$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'category' => 'drinks',
        'name' => $faker->sentence(),
        'price' => $faker->numberBetween(200, 450),
        'weight' => $faker->numberBetween(200, 450),
        'pathToImage' => 'http://loremflickr.com/400/300?random='.rand(1, 100),
        'composition' => $faker->paragraph(1),
        'description' => $faker->paragraph(2)
    ];
});
