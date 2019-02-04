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
            'facebook' => 'https://facebook.com/blog',
            'twitter' => 'https://twitter.com/blog',
            'instagram' => 'https://instagram.com/blog',
            'pinterest' => 'https://pinterest.com/blog',
            'phone' => '856456542',
            'about_us' => 'Laravel blog projesi',
            'address' => 'türkiye-istanbul',
        ]);
    }
}
