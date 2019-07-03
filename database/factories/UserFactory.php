<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your Application. Factories provide a convenient way to generate new
| model instances for testing / seeding your Application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
	static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
