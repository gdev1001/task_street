<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");

            $table->string("transaction_id");
            $table->decimal("amount", 8, 2);
            $table->enum("payment_type", array('checkout', 'payout')); // 1: checkout, 0: payout
            $table->integer("project_id");
            $table->integer("task_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}
