<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfosToCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company', function (Blueprint $table) {
            $table->string('name');
            $table->string('address');
            $table->string('vat');
            $table->string('industry');
            $table->string('bank_account');
            $table->string('bank_name');
            $table->string('bank_vat');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name');
            $table->string('country');
            $table->string('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company', function($table) {
            $table->dropColumn('name');
            $table->dropColumn('address');
            $table->dropColumn('vat');
            $table->dropColumn('industry');
            $table->dropColumn('bank_account');
            $table->dropColumn('bank_name');
            $table->dropColumn('bank_vat');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_name');
            $table->dropColumn('country');
            $table->dropColumn('avatar');
        });
    }
}
