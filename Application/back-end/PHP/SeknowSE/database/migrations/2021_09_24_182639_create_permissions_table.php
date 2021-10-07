<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Permission', function (Blueprint $table) {
            $table->id('id_permission');
            $table->string('role');
        });

        Schema::create('Group_has_Permission', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Group_id_Group');
            $table->foreign('Group_id_Group')->references('id_group')->on('Grouping')->onDelete('cascade');
            $table->unsignedBigInteger('Permission_id_Permission');
            $table->foreign('Permission_id_Permission')->references('id_permission')->on('Permission')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
