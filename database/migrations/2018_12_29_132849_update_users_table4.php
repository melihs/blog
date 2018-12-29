<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable4 extends Migration
    {
        public function up()
        {
            Schema::table('users',function (Blueprint $table){
                $table->addColumn('avatar');
            });
        }
}
