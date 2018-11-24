<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    $title=$faker->sentence;
    return [
            'title' =>$title
    ];
});
