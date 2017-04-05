<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('skills', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->text('name');
			$table->integer('Javascript')->default(0);
			$table->integer('java')->default(0);
			$table->integer('Html')->default(0);
			$table->integer('Mysql')->default(0);
			$table->integer('C++')->default(0);
			$table->integer('Python')->default(0);
			$table->integer('Ruby')->default(0);

			$table->integer('communication')->default(0);
			$table->integer('codingAbility')->default(0);
			$table->integer('learningAblity')->default(0);

		});

		Schema::create('skill_user', function(Blueprint $table)
		{
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('skill_id')->unsigned();
			$table->foreign('skill_id')->references('id')->on('skills');

			$table->integer('hour');
			$table->text('level');
		});



		Schema::create('skill_task', function(Blueprint $table)
		{
			$table->timestamps();

			$table->integer('task_id')->unsigned();
			$table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');

			$table->integer('skill_id')->unsigned();
			$table->foreign('skill_id')->references('id')->on('skills');

			$table->integer('hour');
			$table->text('level');
		});

	Schema::create('project_skill', function(Blueprint $table)
		{
			$table->timestamps();

			$table->integer('project_id')->unsigned();
			$table->foreign('project_id')->references('id')->on('project');

			$table->integer('skill_id')->unsigned();
			$table->foreign('skill_id')->references('id')->on('skills');

			$table->integer('hour');
			$table->text('level');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('skills');


	}

}
