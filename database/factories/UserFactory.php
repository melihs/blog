<?php

use Faker\Generator as Faker;
use App\User;
use App\Role;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    
    return [
        'name'     => $faker->name,
        'role_id'  => random_int(1,3),
        'avatar'   => $faker->imageUrl(),
        'email'    => $faker->unique()->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});
