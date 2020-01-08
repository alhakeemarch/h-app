<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_ranks', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('grade_en')->nullable();
            $table->string('grade_ar')->nullable();
            $table->string('max_value_if_4')->nullable();
            $table->string('min_value_if_4')->nullable();
            $table->string('max_value_if_5')->nullable();
            $table->string('min_value_if_5')->nullable();
            $table->string('max_value_if_100')->nullable();
            $table->string('min_value_if_100')->nullable();
            $table->string('grade_name_en')->nullable();
            $table->string('grade_name_ar')->nullable();


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
        Schema::dropIfExists('grade_ranks');
    }
}
