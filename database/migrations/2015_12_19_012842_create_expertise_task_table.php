<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertiseTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expertise_task', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->text('description');
			$table->integer("sequence");
			$table->string('skill');
			$table->integer('state')->default(0);
			$table->string('start_time');
			$table->string('end_time');
			$table->integer('project_id')->unsigned();
			$table->foreign('project_id')->references('id')->on('project');
			$table->integer('expertise_id')->unsigned();
			$table->foreign('expertise_id')->references('id')->on('expertise');
			$table->timestamps();
		});

		Schema::create('expertise_project', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('state')->default(0);
			$table->string('start_time');
			$table->string('end_time');
			$table->integer('project_id')->unsigned();
			$table->foreign('project_id')->references('id')->on('project');
			$table->integer('expertise_id')->unsigned();
			$table->foreign('expertise_id')->references('id')->on('expertise');
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
		Schema::drop('expertise_task');
		Schema::drop('expertise_project');

	}

}
