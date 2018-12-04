<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'blog uygulaması',
            'description' => 'laravel blog projesi',
            'email' => 'melihsahin24@gmail.com',
            'logo' => '',
        ]);
    }
}
