<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntennasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antennas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("model_nb");
            $table->integer("total_nb_ports");
            $table->integer("ports_lt_1GH");
            $table->integer("ports_btw_1_3GH");
            $table->integer("ports_bt_3GH");
            $table->integer("height_mm");
            $table->string("link_online");
            $table->float("msp_usd");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antennas');
    }
}
