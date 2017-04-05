<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resume', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

			$table->integer('studentID')->unsigned();
			$table->foreign('studentID')->references('id')->on('users');

			$table->text("about");

			$table->text('evaluation');
			
		

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('resume');
	}

}
