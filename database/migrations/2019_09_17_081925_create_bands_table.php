<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("min");
            $table->integer("max");
            $table->string("color");
            $table->string("totalPorts");
            $table->unsignedBigInteger("antennas_id");
        });
        Schema::table('bands', function ($table) {
            // https://stackoverflow.com/questions/22615926/migration-cannot-add-foreign-key-constraint-in-laravel
            $table->foreign('antennas_id')->references('id')->on('antennas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands');
    }
}
