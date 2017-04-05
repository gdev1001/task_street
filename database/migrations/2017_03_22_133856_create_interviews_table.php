<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('interviews', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('expertise_id');
            $table->integer('company_id');
            $table->dateTime('interview_time');
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
		Schema::drop('interviews');
    }
}
