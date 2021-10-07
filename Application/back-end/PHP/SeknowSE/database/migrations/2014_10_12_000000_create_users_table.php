<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('UserAccount', function (Blueprint $table) {
            $table->id('id_user_account');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->boolean('active');
            $table->date('birth_date');
            $table->date('start_work');
            $table->string('Gender');
           
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('UserAccount');
    }
}
