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
            $table->bigIncrements('id')->unsigned();
            // -----------------------------
            $table->string('en_name');
            $table->string('ar_name');
            // -----------------------------
            $table->string('en_capital_city')->nullable();
            $table->string('ar_capital_city')->nullable();
            // -----------------------------
            $table->string('en_nationality')->nullable();
            $table->string('ar_nationality')->nullable();
            $table->string('ar_nationality_male')->nullable();
            $table->string('ar_nationality_female')->nullable();
            // -----------------------------
            $table->string('currency_name')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('currency_rate_us_dollar')->nullable();
            $table->string('currency_rate_at')->nullable();
            // -----------------------------
            $table->string('code_2chracters')->nullable();
            $table->string('code_3chracters')->nullable();
            $table->string('code_numeric')->nullable();
            // -----------------------------
            $table->string('isd_phone_code')->nullable();
            $table->string('population_count')->nullable();
            $table->string('population_count_at')->nullable();
            $table->string('continent')->nullable();



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
        Schema::dropIfExists('countries');
    }
}
