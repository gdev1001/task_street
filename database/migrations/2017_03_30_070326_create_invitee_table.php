<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInviteeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitee', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string("email");
            $table->string("invite_code");

            $table->integer("isRegistered")->unsigned();
            $table->integer("user_id")->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invitee');
    }
}
