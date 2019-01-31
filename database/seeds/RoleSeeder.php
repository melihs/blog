<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 => standart,
        // 2 => moderator,
        // 3 => admin
        DB::table('roles')->insert([
            ['title' => '1'],
            ['title' => '2'],
            ['title' => '3'],
        ]);
    }
}
