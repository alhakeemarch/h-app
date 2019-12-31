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
            $table->unsignedInteger('national_id')->unique();
            // -----------------------------
            $table->bigInteger('created_by_id')->references('id')->on('users');
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->bigInteger('last_edit_by_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_by_name')->references('user_name')->on('users')->nullable();
            // -----------------------------
            $table->boolean('is_employee')->default(false);
            $table->boolean('is_customer')->default(false);
            // -----------------------------
            $table->string('ar_name1');
            $table->string('ar_name2')->nullable();
            $table->string('ar_name3')->nullable();
            $table->string('ar_name4')->nullable();
            $table->string('ar_name5');
            // -----------------------------
            $table->string('en_name1')->nullable();
            $table->string('en_name2')->nullable();
            $table->string('en_name3')->nullable();
            $table->string('en_name4')->nullable();
            $table->string('en_name5')->nullable();
            // -----------------------------
            $table->string('gender')->nullable();
            $table->string('relational_status')->nullable();
            // -----------------------------
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('email')->nullable();
            // -----------------------------
            $table->string('nationaltiy_id')->nullable();
            $table->string('nationaltiy_ar')->nullable();
            $table->string('nationaltiy_en')->nullable();
            // -----------------------------
            $table->unsignedInteger('hafizah_no')->nullable();
            $table->date('national_id_issue_date')->nullable();
            $table->date('national_id_expire_date')->nullable();
            $table->string('national_id_issue_place')->nullable();
            // -----------------------------
            $table->string('pasport_no')->nullable();
            $table->date('pasport_issue_date')->nullable();
            $table->date('pasport_id_expire_date')->nullable();
            $table->string('pasport_id_issue_place')->nullable();
            // -----------------------------
            $table->date('ah_birth_date')->nullable();
            $table->date('ad_birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('birth_city')->nullable();

            // =============================
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
        Schema::dropIfExists('people');
    }
}
