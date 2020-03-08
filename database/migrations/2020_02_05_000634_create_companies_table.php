<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('unified_code')->unique(); // رقم المميز 700
            $table->bigInteger('commercial_registration_no')->unique(); // رقم السجل
            $table->string('commercial_name'); // الإسم التجاري
            $table->bigInteger('owner_name')->nullable(); // اسم المالك
            $table->bigInteger('owner_national_id')->references('national_id')->on('people')->nullable(); // رقم الهوية
            $table->string('nationality_code')->references('code_2chracters')->on('countries')->nullable(); // رمز الجنسية
            $table->string('authorised_person_name')->nullable(); // اسم المدير أو الوكيل أو المفوض
            $table->string('headquarter')->nullable(); // المقر الرئيسي
            $table->string('issue_date')->nullable(); // تاريخ إصدار السجل
            $table->string('end_date')->nullable(); // تاريخ إنتهاء السجل
            $table->string('issue_place')->nullable(); // مكان إصدار السجل
            $table->boolean('is_primary_commercial_registration')->nullable(); // هل سجل رئيسي
            $table->boolean('is_sub_commercial_registration')->nullable(); //  هل سجل فرعي

            $table->string('chamber_of_commerce_id'); // رقم عضوية الغرفة التجارية
            $table->bigInteger('VAT_account_no'); // الرقم الضريبي
            $table->bigInteger('POBox_no'); // ص ب
            $table->bigInteger('zip_code'); // الرمز البريدي
            $table->string('main_phone'); // هاتف
            $table->string('fax_no'); // فاكس





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
        Schema::dropIfExists('companies');
    }
}
