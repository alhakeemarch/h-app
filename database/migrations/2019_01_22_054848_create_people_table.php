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
            $table->bigIncrements('id')->unsigned();
            $table->unsignedInteger('national_id')->unique();
            // -----------------------------
            $table->boolean('is_employee')->default(false)->nullable();
            $table->boolean('is_customer')->default(false)->nullable();
            // -----------------------------
            $table->foreignId('person_title_id')->nullable()->references('id')->on('person_titles');
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
            $table->string('prefer_language')->nullable();
            // -----------------------------
            $table->string('nationality_code')->nullable();
            $table->string('nationality_ar')->nullable();
            $table->string('nationality_en')->nullable();
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
            $table->string('employment_no')->nullable();
            $table->string('fingerprint_no')->nullable();
            // -----------------------------
            $table->string('degree')->nullable();
            $table->string('major_id')->nullable()->references('id')->on('Mager');
            $table->string('graduated_from')->nullable();
            $table->string('college_name')->nullable();
            $table->string('graduation_year')->nullable();
            $table->string('graduation_points')->nullable();
            $table->string('graduation_points_of')->nullable();
            $table->string('graduation_grade_rank_id')->nullable()->references('id')->on('grade_ranks');
            // -----------------------------
            $table->string('id_job_title')->nullable();
            $table->string('job_title')->nullable();
            $table->bigInteger('job_level')->nullable();
            $table->string('job_division')->nullable();
            $table->string('job_position')->nullable();
            $table->string('current_project')->nullable();
            // -----------------------------
            $table->string('SCE_membership_no')->nullable();
            $table->date('SCE_membership_type_id')->nullable()->references('id')->on('sce_membership_types');
            $table->date('SCE_membership_expire_date')->nullable();
            $table->date('SCE_classification_expire_date')->nullable();
            // -----------------------------
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_extension')->nullable();
            $table->string('email')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
            // -----------------------------
            $table->string('foreign_phone1')->nullable();
            $table->string('foreign_phone2')->nullable();
            $table->text('foreign_address1')->nullable();
            $table->text('foreign_address2')->nullable();
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
            $table->string('bank_id')->nullable()->references('id')->on('banks');
            $table->string('bank_account_no')->nullable();
            $table->string('bank_IBAN_no')->nullable();
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
        Schema::dropIfExists('people');
    }
}
