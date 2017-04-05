<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_student', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('project_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('student')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('project')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('user_project_user_id_foreign');
        Schema::dropForeign('user_project_project_id_foreign');
        Schema::drop('project_student');
    }
}
