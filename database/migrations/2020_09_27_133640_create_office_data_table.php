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
            $table->string('mobile')->nullable();
            $table->string('mobile2')->nullable();
            $table->string('mobile3')->nullable();
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
            $table->string('p_o_box')->nullable(); // صندوق البريد
            $table->string('box_postal_code')->nullable(); // الرمز البريدي
            $table->string('wasel_ar')->nullable(); // واصل
            $table->string('wasel_en')->nullable(); // واصل
            $table->string('na_building_no')->nullable(); // رقم المبنى
            $table->string('na_city_ar')->nullable(); // المدينة
            $table->string('na_city_en')->nullable(); // المدينة
            $table->string('na_street_name_ar')->nullable(); // اسم الشارع
            $table->string('na_street_name_en')->nullable(); // اسم الشارع
            $table->string('na_postal_code')->nullable(); // الرمز البريدي
            $table->string('na_district_ar')->nullable(); // الحي
            $table->string('na_district_en')->nullable(); // الحي
            $table->string('na_additional_no')->nullable(); // الرقم الإضافي
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
            $table->foreignId('owner_id')->nullable()->references('id')->on('people');
            $table->foreignId('manager_id')->nullable()->references('id')->on('people');
            $table->foreignId('general_manager_id')->nullable()->references('id')->on('people');
            $table->foreignId('design_manager_id')->nullable()->references('id')->on('people');
            $table->foreignId('safety_manager_id')->nullable()->references('id')->on('people');
            $table->foreignId('administrative_manager_id')->nullable()->references('id')->on('people');
            $table->foreignId('ceo_id')->nullable()->references('id')->on('people'); // CEO—Chief Executive Officer
            $table->foreignId('coo_id')->nullable()->references('id')->on('people'); // COO—Chief Operating Officer
            $table->foreignId('cfo_id')->nullable()->references('id')->on('people'); // CFO—Chief Financial Officer
            $table->foreignId('cio_id')->nullable()->references('id')->on('people'); // CIO—Chief Information Officer
            $table->foreignId('cto_id')->nullable()->references('id')->on('people'); // CTO—Chief Technology Officer
            $table->foreignId('cmo_id')->nullable()->references('id')->on('people'); // CMO—Chief Marketing Officer
            $table->foreignId('chro_id')->nullable()->references('id')->on('people'); // CHRO—Chief Human Resources Officer
            $table->foreignId('cco_id')->nullable()->references('id')->on('people'); // CCO—Chief Customer Officer
            //  -----------------------------
            $table->integer('uni_700_no')->nullable();
            $table->bigInteger('commercial_registration_no')->unique(); // رقم السجل
            $table->string('commercial_name'); // الإسم التجاري
            $table->string('headquarter')->nullable(); // المقر الرئيسي
            $table->string('issue_date')->nullable(); // تاريخ إصدار السجل
            $table->string('end_date')->nullable(); // تاريخ إنتهاء السجل
            $table->string('issue_place')->nullable(); // مكان إصدار السجل
            $table->boolean('is_primary_commercial_registration')->nullable(); // هل سجل رئيسي
            $table->boolean('is_sub_commercial_registration')->nullable(); //  هل سجل فرعي
            $table->string('chamber_of_commerce_no')->nullable();; // رقم عضوية الغرفة التجارية
            $table->bigInteger('VAT_account_no')->nullable();; // الرقم الضريبي
            //  -----------------------------
            $table->string('SEC_license_no')->nullable();; // رقم ترخيص الهيئة السعودية للمهندسين
            $table->string('SEC_safety_license_no')->nullable();; // رقم ترخيص الهيئة السعودية للمهندسين للسلامة
            $table->string('SEC_license_no_2')->nullable();; // رقم ترخيص الهيئة السعودية للمهندسين للسلامة
            $table->string('SEC_license_no_3')->nullable();; // رقم ترخيص الهيئة السعودية للمهندسين للسلامة
            $table->string('SEC_license_no_4')->nullable();; // رقم ترخيص الهيئة السعودية للمهندسين للسلامة
            $table->string('SEC_license_no_5')->nullable();; // رقم ترخيص الهيئة السعودية للمهندسين للسلامة
            //  -----------------------------
            $table->string('shop_open_license_no'); // رقم رخصة فتح المحل
            $table->string('htsd_uni_no'); // رقم المنشأة في مكتب العمل
            $table->string('gosi_uni_no'); // رقم المنشأة في التأمنيات الإجتماعية
            //  -----------------------------
            $table->string('other1')->nullable();
            $table->string('other2')->nullable();
            $table->string('other3')->nullable();
            $table->string('other4')->nullable();
            $table->string('other5')->nullable();
            $table->string('other6')->nullable();
            $table->string('other7')->nullable();
            $table->string('other9')->nullable();
            $table->string('other10')->nullable();
            $table->string('other11')->nullable();
            $table->string('other12')->nullable();
            $table->string('other13')->nullable();
            $table->string('other14')->nullable();
            $table->string('other15')->nullable();
            $table->string('other16')->nullable();
            $table->string('other17')->nullable();
            $table->string('other18')->nullable();
            $table->string('other19')->nullable();
            $table->string('other20')->nullable();


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
