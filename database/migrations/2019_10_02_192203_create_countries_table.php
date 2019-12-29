<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            // -----------------------------
            $table->string('ar_name');
            $table->string('en_name');
            // -----------------------------
            $table->string('ar_capital_city');
            $table->string('en_capital_city');
            // -----------------------------
            $table->string('ar_nationality');
            $table->string('en_nationality');
            // -----------------------------
            $table->string('currency_name');
            $table->string('currency_code');
            $table->string('currency_rate_us_dollar');
            $table->string('currency_rate_date');
            // -----------------------------
            $table->string('2w_code');
            $table->string('3w_code');
            $table->string('numeric_code');
            // -----------------------------
            $table->string('isd_phone_code');
            $table->string('population_count');
            $table->string('population_count_date');
            $table->string('continent');





            // =============================
            $table->bigInteger('created_by_id')->references('id')->on('users');
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->bigInteger('last_edit_by_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_by_name')->references('user_name')->on('users')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
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
        Schema::dropIfExists('countries');
    }
}
