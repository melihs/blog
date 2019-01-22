<?php

use Faker\Generator as Faker;
use App\Category;
use App\User;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    $title=$faker->sentence;
    return [
        'title' => $title,
        'content' =>$faker->text,
        'category_id' => function()
        {
            return Category::all()->random();
        },
        'slider' =>'0',
        'slug' => str_slug($title),
        'user_id' => function ()
        {
            return User::all()->random();
        }
    ];
});
