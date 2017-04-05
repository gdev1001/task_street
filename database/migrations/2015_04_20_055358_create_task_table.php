<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
	

            $table->string('name');
            $table->text('description');
			$table->text('input');
			$table->text('output');

			$table->integer('budget');
            $table->integer('estimateTime');

            $table->integer("sequence");
			$table->rememberToken();
			$table->boolean('completed')->default(false);
			$table->boolean('status')->default(false);
			$table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('project');

   //          $table->timestamps('start_time');
			$table->timestamps('end_time');


		});



		Schema::create('student_task', function(Blueprint $table)
		{
			$table->integer('student_id')->unsigned()->index();
			$table->foreign('student_id')->references('id')->on('student');

			$table->integer('task_id')->unsigned()->index();
			$table->foreign('task_id')->references('id')->on('tasks');

			$table->boolean('working')->default(true);

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
		Schema::dropIfExists('tasks');
		Schema::drop('student_task');
	}

}
