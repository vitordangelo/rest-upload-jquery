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

$factory->define(App\User::class, function (Faker\Generator $faker) { //Configuração dos dados que serão gerados
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastname,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'city' => $faker->city,
        'state' => $faker->state,
    ];
});
