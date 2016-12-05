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
    $categories = array(
        'pizza',
        'sushi',
        'drinks',
        'sausages'
    );

    return [
        'category' => $categories[array_rand($categories)],
        'name' => $faker->firstNameMale(),
        'price' => $faker->numberBetween(200, 450),
        'composition' => $faker->paragraph(1),
        'description' => $faker->paragraph(2)
    ];
});

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name,
        'email' =>  $faker->safeEmail,
        'phone_number' => str_random(15),
        'password' =>  bcrypt('password'),
    ];
});
