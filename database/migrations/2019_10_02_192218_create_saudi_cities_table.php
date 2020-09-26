<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaudiCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saudi_cities', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('ar_region_name');
            $table->string('en_region_name');
            $table->string('ar_city_name');
            $table->string('en_city_name');
            // -----------------------------
            $table->string('territory')->nullable(); // الإقليم - حجاز - نجد - عسير
            // -----------------------------
            $table->string('landline_phone_code')->nullable();
            // -----------------------------
            $table->string('population_count')->nullable();
            $table->string('population_count_at')->nullable();
            // -----------------------------
            $table->string('airport_name')->nullable();
            $table->string('airport_IATA_code')->nullable();
            $table->string('airport_ICAO_code')->nullable();
            $table->string('airport_FAA_code')->nullable();
            $table->string('is_international_airport')->nullable()->default(false);
            $table->string('is_local_airport')->nullable();
            // -----------------------------





            // =============================
            // -----------------------------
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            // -----------------------------
            $table->bigInteger('created_by_id')->references('id')->on('users');
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->bigInteger('last_edit_by_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_by_name')->references('user_name')->on('users')->nullable();
            // -----------------------------
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('saudi_cities');
    }
}
