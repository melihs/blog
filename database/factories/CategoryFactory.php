<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    $title=$faker->word;
    return [
            'title' => $title,
            'slug' => str_slug($title),
            'description' =>$faker->sentence,
    ];
});
