<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->nullable();

            $table->string('en_name')->nullable();
            $table->string('ar_name');
            $table->string('area')->nullable();
            $table->bigInteger('mi_prinx')->nullable();
            // -----------------------------
            $table->bigInteger('aad_user_id')->references('id')->on('users');
            $table->string('add_user_name');
            $table->bigInteger('last_edit_user_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_user_name')->nullable();
            // -----------------------------
            $table->bigInteger('municipality_branche_id')->nullable();
            $table->bigInteger('municipality_branche_code')->nullable();
            $table->string('municipality_branche_ar_name')->nullable();
            $table->string('municipality_branche_en_name')->nullable();
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
        Schema::dropIfExists('districts');
    }
}
