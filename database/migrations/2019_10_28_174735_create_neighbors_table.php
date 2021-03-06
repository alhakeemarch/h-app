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
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('code')->nullable();
            // -----------------------------
            $table->string('en_name')->nullable();
            $table->string('ar_name');
            $table->string('area')->nullable();
            $table->bigInteger('mi_prinx')->nullable();

            $table->string('population')->nullable();
            $table->string('buliding_hight')->nullable();
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
        Schema::dropIfExists('neighbors');
    }
}
