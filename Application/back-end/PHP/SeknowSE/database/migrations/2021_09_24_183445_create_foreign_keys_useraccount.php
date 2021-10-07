<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysUseraccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('UserAccount', function (Blueprint $table) {
          $table->unsignedBigInteger('user_type');
          $table->foreign('user_type')->references('id_user_type')->on('UserType');
          $table->unsignedBigInteger('Grouping');
          $table->foreign('Grouping')->references('id_group')->on('Grouping');
          $table->unsignedBigInteger('worksIn')->nullable();
          $table->foreign('worksIn')->references('id_company')->on('Company');
          $table->unsignedBigInteger('owner')->nullable();
          $table->foreign('owner')->references('id_company')->on('Company');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
