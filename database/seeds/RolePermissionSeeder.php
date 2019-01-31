<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * role_id => 1  standart role, permissions => r
         * role_id => 2  moderator role,permissions => r,w,d
         * role_id => 3  admin role, permissions => r,w,d,a
         */
        DB::table('role_permission')->insert([

            [
                'role_id' => '1',
                'permission_id' => '1',
            ],
            [
                'role_id' => '2',
                'permission_id' => '1',
            ],
            [
                'role_id' => '2',
                'permission_id' => '2',
            ],
            [
                'role_id' => '2',
                'permission_id' => '3',
            ],
            [
                'role_id' => '3',
                'permission_id' => '1',
            ],
            [
                'role_id' => '3',
                'permission_id' => '2',
            ],
            [
                'role_id' => '3',
                'permission_id' => '3',
            ],
            [
                'role_id' => '3',
                'permission_id' => '4',
            ],
        ]);
    }
}
