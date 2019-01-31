<?php

use Illuminate\Database\Seeder;
use App\Page;
use App\User;
use App\Category;
use App\Post;
use App\Role;
use App\Permission;
use App\RolePermission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class,10)->create();
        factory(User::class,10)->create();
        factory(Page::class,100)->create();
        factory(Post::class,10)->create();
        $this->call(SettingTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
