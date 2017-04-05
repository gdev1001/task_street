<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps("Start_time");
            $table->boolean("state");
            $table->integer("project_id")->unsigned();
            $table->integer("task_id")->unsigned();

            $table->foreign("project_id")->references("id")->on("project");
            $table->foreign("task_id")->references("id")->on("tasks");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }

}
