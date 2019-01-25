<?php

use Faker\Generator as Faker;
use App\Page;

$factory->define(Page::class, function (Faker $faker) {
    $title = $faker->word;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $faker->paragraph,
    ];
});
