<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('submission', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();


            $table->integer("task_id")->unsigned();
            $table->foreign('task_id')->references('id')->on('tasks');

            $table->integer("user_id")->unsigned();
            $table->foreign('user_id')->references('id')->on('student');

            $table->integer('validated')->default('0');

            $table->string("file_path");


        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission');
    }

}
