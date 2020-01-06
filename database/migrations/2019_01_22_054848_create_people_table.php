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
            $table->string('religion')->nullable();
            // -----------------------------
            $table->string('nationaltiy_code')->nullable();
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
            $table->date('pasport_expire_date')->nullable();
            $table->string('pasport_issue_place')->nullable();
            // -----------------------------
            $table->date('ah_birth_date')->nullable();
            $table->date('ad_birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('birth_city')->nullable();
            // =============================

            // -----------------------------
            $table->date('ah_hiring_date')->nullable();
            $table->date('ad_hiring_date')->nullable();
            $table->string('hiring_day')->nullable();
            // -----------------------------
            $table->string('employee_no')->nullable();
            $table->string('fingerprint_no')->nullable();
            // -----------------------------
            $table->string('Degree')->nullable();
            $table->string('specialization')->nullable();
            $table->string('id_job_title')->nullable();
            $table->string('job_title')->nullable();
            $table->string('division')->nullable();
            $table->string('current_project')->nullable();
            // -----------------------------
            $table->string('SCE_membership_no')->nullable(); // Saudi Council of Engineers الهيئة السعودية للمهندسين
            $table->date('SCE_membership_expire_date')->nullable();
            // -----------------------------
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
            // -----------------------------
            $table->string('foreign_phone1')->nullable();
            $table->string('foreign_phone2')->nullable();
            $table->string('foreign_address1')->nullable();
            $table->string('foreign_address2')->nullable();
            $table->string('personal_email')->nullable();
            // -----------------------------
            $table->string('SNA_application_no')->nullable(); // Saudi National Address العنوان الوطني
            $table->string('SNA_service_no')->nullable();
            $table->string('SNA_account_no')->nullable();
            $table->string('SNA_building_no')->nullable();
            $table->string('SNA_street_name')->nullable();
            $table->string('SNA_district_name')->nullable();
            $table->string('SNA_city_name')->nullable();
            $table->string('SNA_zip_code')->nullable();
            $table->string('SNA_additional_no')->nullable();
            $table->string('SNA_unit_no')->nullable();
            $table->string('SNA_residence_type')->nullable(); // شقة - بيت شعبي - فيلا - قصر - دوبليكس - فندق -
            $table->string('SNA_residence_ownership')->nullable(); // مالك - مستأجر - أخرى
            // -----------------------------
            $table->string('bank_name')->nullable();
            $table->string('bank_acount_no')->nullable();
            $table->string('bank_IBAN_no')->nullable();
            $table->string('bank_branch_name')->nullable();
            $table->string('bank_branch_no')->nullable();
            // -----------------------------
            $table->string('emergency_contact_name1')->nullable();
            $table->string('emergency_contact_mobile1')->nullable();
            $table->string('emergency_contact_relationship1')->nullable();
            $table->string('emergency_contact_name2')->nullable();
            $table->string('emergency_contact_mobile2')->nullable();
            $table->string('emergency_contact_relationship2')->nullable();

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
