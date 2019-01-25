<?php

use Faker\Generator as Faker;
use App\Category;
use App\User;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    $title=$faker->word;
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' =>$faker->paragraph,
        'category_id' => function()
        {
            return Category::all()->random();
        },
        'slider' =>'0',
        'user_id' => function ()
        {
            return User::all()->random();
        }
    ];
});
