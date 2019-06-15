<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCachedResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cached_results', function (Blueprint $table) {
            // 900 is the maximum allowed length of key size
            // id is the query form imploded array
            $table->string("query_form")->primary();
            $table->longText("response_ids");
            $table->integer("sum_ports");
            // if limit row is reached these columns are useful
            // to cache more range.
            $table->boolean("state_finish")->default(false);
            $table->integer("combination_nb")->default(0);
            // if changed do require a new cache
            $table->integer("antennas_count");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cached_results');
    }
}
