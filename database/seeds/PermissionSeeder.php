<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * permissions
         *
         * r => read,
         * w => write,
         * d => delete,
         * a => assignment,
         */
        DB::table('permissions')->insert([
            ['title' => 'r'],
            ['title' => 'w'],
            ['title' => 'd'],
            ['title' => 'a'],
        ]);
    }
}
