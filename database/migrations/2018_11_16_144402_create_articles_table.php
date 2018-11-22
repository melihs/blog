<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('category_id')->unsigned();   //ınsigned() boş anlamında
            $table->integer('user_id')->unsigned();
            $table->string('image')->nullable();
            $table->rememberToken();  //remember me for login page

            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('user_id ')->references( 'id' )->on('users')->ondelete('cascade');
//            $table->foreign('category_id ')->references( 'id' )->on('categories')->ondelete('cascade');  //remember me for login page
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
