<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRankTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rank', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer("user_id")->unsigned();
			$table->foreign("user_id")->references('id')->on('users');

			$table->integer("task_id")->unsigned();
			$table->foreign("task_id")->references("id")->on("tasks");

			$table->integer("overall_point");


			$table->text("skills");

			//Other data retrieved from code ...
		});

		Schema::create('rank_user', function(Blueprint $table)

		{
			$table->timestamps();

			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('rank_id')->unsigned();
			$table->foreign('rank_id')->references('id')->on('rank');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rank');
		Schema::drop('rank_company');
	}

}
