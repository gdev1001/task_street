<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->integer('isActive')->default(0);
            $table->boolean('isStudent')->default(false);
            $table->boolean('isCompany')->default(false);
            $table->boolean('isExpertise')->default(false);
            $table->string('confirmation_code');


        });


        Schema::create('student', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');

        });

         Schema::create('company', function (Blueprint $table) {
             $table->timestamps();
             $table->increments('id');

             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
        });

        Schema::create('expertise', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->ondelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
        Schema::dropIfExists('student');
        Schema::dropIfExists('users');

    }

}
