<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePagesTable1 extends Migration
{
    /**
     * rename columnn name from "article" to "content"
     */
    public function up()
    {
        Schema::table('pages',function (Blueprint $table){
            $table->renameColumn('article','content');
        });
    }

    public function down()
    {
        //
    }
}
