<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use phpDocumentor\Reflection\Types\Nullable;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('project_no')->unique()->nullable();
            $table->string('project_name_ar')->nullable();
            $table->string('project_name_en')->nullable();
            // -----------------------------
            $table->foreignID('person_id')->nullable()->references('id')->on('people'); // المالك أو ممثل المالك
            $table->foreignID('organization_id')->nullable()->references('id')->on('organizations'); // المالك أو ممثل المالك
            $table->foreignId('owner_id')->nullable();
            $table->foreignId('owner_national_id')->nullable();
            // $table->string('owner_type')->nullable(); // فرد - شركة - ورثة - وقف - جهة 
            $table->foreignId('owner_type_id')->nullable()->default(1)->references('id')->on('owner_types'); // فرد - شركة - ورثة - وقف - جهة 
            $table->string('owner_name_ar')->nullable();
            $table->string('owner_name_en')->nullable();
            $table->string('owner_main_mobile_no')->nullable();
            $table->text('extra_owners_list')->nullable();
            $table->text('extra_owners_info')->nullable();
            // -----------------------------
            $table->foreignId('previous_person_id')->nullable()->references('id')->on('people');
            $table->foreignId('previous_owner_id')->nullable();
            $table->foreignId('previous_owner_type')->nullable();
            // -----------------------------
            $table->foreignId('representative_id')->nullable()->references('id')->on('people');
            $table->foreignId('representative_national_id')->nullable();
            $table->string('representative_type_id')->nullable()->references('id')->on('representative_types'); // وكيل شرعي - مفوض - ناظر الوقف - ولي على قصر - 
            $table->string('representative_name_ar')->nullable();
            $table->string('representative_name_en')->nullable();
            $table->string('representative_main_mobile_no')->nullable();
            $table->string('representative_authorization_type')->nullable(); // وكالة - تفويض - صط نظارة - صك ولاية
            $table->string('representative_authorization_no')->nullable();
            $table->string('representative_authorization_issue_date')->nullable();
            $table->string('representative_authorization_issue_place')->nullable();
            $table->string('representative_authorization_expire_date')->nullable();
            $table->text('extra_representatives_list')->nullable();
            // -----------------------------
            $table->string('project_status_id')->nullable()->references('id')->on('project_statuses');
            $table->string('project_type')->nullable();
            $table->string('project_assign_to_user')->nullable();
            $table->string('project_arch_hight')->nullable();
            $table->string('project_str_hight')->nullable();
            // -----------------------------
            $table->string('byanat_almawqi_no')->nullable();
            $table->string('byanat_almawqi_issue_date')->nullable();
            $table->string('qarar_masahe_no')->nullable();
            $table->string('qarar_masahe_issue_date')->nullable();
            $table->string('tanzeem_plan_no')->nullable();
            $table->string('tanzeem_plan_issue_date')->nullable();
            $table->string('old_rokhsa_no')->nullable();
            $table->string('old_rokhsa_issue_date')->nullable();
            $table->string('last_rokhsa_no')->nullable();
            $table->string('last_rokhsa_issue_date')->nullable();
            $table->text('other_doc_details')->nullable();
            // -----------------------------
            $table->foreignId('project_manager_id')->nullable()->references('id')->on('people');
            $table->foreignId('project_coordinator_id')->nullable()->references('id')->on('people');
            // -----------------------------
            $table->foreignId('arch_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('elevation_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('str_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('san_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('elec_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('fire_fighting_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('fire_alarm_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('fire_escape_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('tourism_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('interior_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('landscape_designed_by_id')->nullable()->references('id')->on('people');
            $table->foreignId('surveyed_by_id')->nullable()->references('id')->on('people');
            // -----------------------------
            $table->foreignId('main_draftsman_id')->nullable()->references('id')->on('people');
            $table->foreignId('draftsman_1_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_1_mission')->nullable();
            $table->foreignId('draftsman_2_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_2_mission')->nullable();
            $table->foreignId('draftsman_3_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_3_mission')->nullable();
            $table->foreignId('draftsman_4_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_4_mission')->nullable();
            $table->foreignId('draftsman_5_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_5_mission')->nullable();
            $table->foreignId('draftsman_6_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_6_mission')->nullable();
            $table->foreignId('draftsman_7_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_7_mission')->nullable();
            $table->foreignId('draftsman_8_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_8_mission')->nullable();
            $table->foreignId('draftsman_9_id')->nullable()->references('id')->on('people');
            $table->text('draftsman_9_mission')->nullable();
            $table->text('extra_draftsman_details')->nullable();
            // -----------------------------
            $table->text('contracts_list_names')->nullable();
            $table->unsignedBigInteger('total_project_price')->nullable();
            $table->unsignedBigInteger('total_project_cost')->nullable();
            // -----------------------------
            $table->foreignId('plot_id')->nullable();
            $table->string('project_location')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
