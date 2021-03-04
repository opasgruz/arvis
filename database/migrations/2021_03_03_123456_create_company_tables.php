<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable(false);
            $table->text('description')->nullable(true);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('positions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 20);
            $table->string('name', 255);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('workers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('filial_id')->nullable(true);
            $table->integer('position_id')->nullable(false);
            $table->string('firstname', 255);
            $table->string('middlename', 255);
            $table->string('lastname', 255);

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('filial_id')->on('filials')->references('id');
            $table->foreign('position_id')->on('positions')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('filials');
    }
}
