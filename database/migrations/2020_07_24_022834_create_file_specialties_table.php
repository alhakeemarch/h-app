<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileSpecialtiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_specialties', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('specialty')->nullable();
            $table->string('description')->nullable();
            $table->string('description2')->nullable();
            $table->string('belongto')->nullable();

            //  ============================
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            //  -----------------------------
            $table->bigInteger('created_by_id')->references('id')->on('users');
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->bigInteger('last_edit_by_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_by_name')->references('user_name')->on('users')->nullable();
            //  -----------------------------
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
        Schema::dropIfExists('file_specialties');
    }
}
