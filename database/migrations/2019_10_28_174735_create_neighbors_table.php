<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neighbors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->nullable();
            // -----------------------------
            $table->string('en_name')->nullable();
            $table->string('ar_name');
            $table->string('area')->nullable();
            $table->bigInteger('mi_prinx')->nullable();

            $table->string('population')->nullable();
            $table->string('buliding_hight')->nullable();
            // -----------------------------
            $table->bigInteger('aad_user_id');
            $table->string('add_user_name');
            $table->bigInteger('last_edit_user_id')->nullable();
            $table->string('last_edit_user_name')->nullable();
            // -----------------------------
            $table->bigInteger('municipality_branche_id')->nullable();
            $table->bigInteger('municipality_branche_code')->nullable();
            $table->string('municipality_branche_ar_name')->nullable();
            $table->string('municipality_branche_en_name')->nullable();
            // -----------------------------
            $table->bigInteger('district_id')->nullable();
            $table->bigInteger('district_code')->nullable();
            $table->string('district_ar_name')->nullable();
            $table->string('district_en_name')->nullable();
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
        Schema::dropIfExists('neighbors');
    }
}
