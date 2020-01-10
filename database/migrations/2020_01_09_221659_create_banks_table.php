<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->bigIncrements('id');
            // -----------------------------
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            // -----------------------------
            $table->string('IBAN_2digit_code')->nullable();
            $table->string('swift_code')->nullable();
            $table->string('symbol_en')->nullable();
            $table->string('symbol_ar')->nullable();
            // -----------------------------
            $table->string('web_address')->nullable();
            // .............................
            $table->string('phone_banking_in')->nullable();
            $table->string('phone_banking_out')->nullable();
            $table->string('privileged_phone_banking_in')->nullable();
            $table->string('privileged_phone_banking_out')->nullable();
            $table->string('online_banking_link')->nullable();
            // .............................
            $table->string('business_phone_banking_in')->nullable();
            $table->string('business_phone_banking_out')->nullable();
            $table->string('business_online_banking_link')->nullable();
            $table->string('business_email')->nullable();
            // .............................
            $table->string('services_phone_in')->nullable();
            $table->string('services_phone_out')->nullable();
            $table->string('contact_email')->nullable();
            // .............................
            $table->string('consulting_phone')->nullable();
            $table->string('financing_phone')->nullable();
            // .............................
            $table->string('complaint_phone')->nullable();
            $table->string('complaint_email')->nullable();
            // .............................
            $table->string('fax')->nullable(); // فاكس
            // -----------------------------

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
        Schema::dropIfExists('banks');
    }
}
