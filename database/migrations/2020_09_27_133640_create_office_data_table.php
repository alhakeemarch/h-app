<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_data', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            //  -----------------------------
            $table->string('phone')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('phone4')->nullable();
            $table->string('phone5')->nullable();
            $table->string('phone6')->nullable();
            $table->string('phone7')->nullable();
            $table->string('phone8')->nullable();
            $table->string('phone9')->nullable();
            $table->string('fax')->nullable();
            $table->string('fax1')->nullable();
            //  -----------------------------
            $table->string('email')->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('email4')->nullable();
            $table->string('email5')->nullable();
            //  -----------------------------
            $table->string('website')->nullable();
            $table->string('website1')->nullable();
            $table->string('website2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('linkedin')->nullable();
            //  -----------------------------

المالك
المدير
المدير العام
مدير التصميم
مدير الدفاع المدني


            //  ============================
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            //  -----------------------------
            $table->foreignId('created_by_id')->references('id')->on('users');
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->foreignId('last_edit_by_id')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('office_data');
    }
}
