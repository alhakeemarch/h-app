<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_titles', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('short_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('short_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();


            // =============================
            // -----------------------------
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            $table->longText('created_at_note')->nullable();
            // -----------------------------
            $table->foreignId('created_by_id')->references('id')->on('users');
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->foreignId('last_edit_by_id')->nullable()->references('id')->on('users');
            $table->string('last_edit_by_name')->nullable()->references('user_name')->on('users');
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
        Schema::dropIfExists('person_titles');
    }
}
