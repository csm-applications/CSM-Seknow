<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Company', function (Blueprint $table) {
            $table->id('id_company');
            $table->string('name');
            $table->string('phone');
            $table->string('foundation_date');
            $table->string('Description');
            $table->unsignedBigInteger('owner');
            $table->foreign('owner')->references('id_user_account')->on('UserAccount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
