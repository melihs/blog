<?php

use Illuminate\Database\Seeder;
use App\Page;
use App\User;
use App\Category;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,10)->create();
        factory(Category::class,10)->create();
        factory(Post::class,100)->create();
        factory(Page::class,100)->create();
        $this->call(SettingTableSeeder::class);
    }
}
