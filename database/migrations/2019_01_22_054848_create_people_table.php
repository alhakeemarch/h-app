<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('national_id')->unique();
            $table->string('name1');
            $table->string('name2')->nullable();
            $table->string('name3')->nullable();
            $table->string('name4')->nullable();
            $table->string('name5');
            $table->string('nationaltiy')->nullable();
            $table->integer('hafizah_no')->nullable();
            $table->date('national_id_issue_date')->nullable();
            $table->string('national_id_issue_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
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
        Schema::dropIfExists('people');
    }
}
