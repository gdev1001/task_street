<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_question', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('answer');

            $table->string('question');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');

        });




    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project_question');
    }
}
