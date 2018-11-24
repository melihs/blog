<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    $title=$faker->sentence;
    return [
            'title' =>$title
    ];
});
