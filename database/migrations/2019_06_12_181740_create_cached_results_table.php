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
            // 1000 bytes is the maximum allowed length of key size
            // query_form is unified key id that determine the form of the user
            // we generate it from the field input by sorting them then imploding
            // in one string check CachedResult@cachedResult -> $generatedSerial
            // imploding array mean: (concatenate all its values to get one string)
            // this query_form by default is encoded with utf8mb4_unicode_ci each character saved using 3 bytes
            // and when form is full filled, the length of generated string become 426 bytes < 1000 which is acceptable key
            // however this is one way form=>key,and we lose the possibility to parse it back (form <= key)
            // another approach is serializing array, and un_serializing it later on, (i.e. form <=> key at the same time)
            // but when form is full filled it can reach 1542 bytes length > 1000 bytes
            // so the solution was changing collation to "ascii_general_ci" where each character is saved using 1 bytes
            // (new key maximum size  = 514) and since we deal only with numbers it's a lossless encoding.
            // And now it is easier to save the serialization directly, the length problem is solved
            // and when retrieving the query_form we simply unserialize it, and refill the form.
            // also same idea used to save space(1/3) with response_ids using collation ascii_general_ci.
            $table->string("query_form", 1000)
                ->collation("ascii_general_ci")
                ->primary();
            // save more space
            $table->longText("response_ids")->collation("ascii_general_ci");
            $table->integer("sum_ports");
            // if limit row is reached these columns are useful
            // to cache more range.
            $table->boolean("state_finish")->default(false);

            // if changed do require a new cache
            $table->integer("antennas_count");

            $table->integer("combination_nb")->default(0);
            $table->integer("solution_count")->default(0);


            // Log query information
            $table->string('email')->default("guest"); // reference logged user who did it
            $table->string('type')->default("guest"); // reference logged user who did it
            $table->timestamps(); // at what time
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
