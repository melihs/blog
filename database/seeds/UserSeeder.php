<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'  => '3',
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'avatar'   => null,
            'remember_token' => null,
        ]);
    }
}
