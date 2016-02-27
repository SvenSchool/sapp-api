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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'email' => $faker->safeEmail,
        'first_name' => $faker->firstName,
        'insertion' => $faker->optional()->suffix,
        'last_name' => $faker->lastName,
        'password' => bcrypt('hello123'),
        'type_id' => $faker->numberBetween(1, 3),
    ];
});

$factory->define(App\Type::class, function(Faker\Generator $faker) {
    return [
        'title' => strtolower($faker->name),
        'name' => $faker->name,
    ];
});
