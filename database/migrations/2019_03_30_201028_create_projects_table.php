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
            $table->bigIncrements('id');
            $table->bigInteger('project_no');
            $table->bigInteger('project_name')->nullable();
            // -----------------------------
            $table->bigInteger('created_by_id'); // من أضاف المشروع على النظام
            $table->string('created_by_user'); // من أضاف المشروع على النظام
            $table->bigInteger('last_edit_by_id')->nullable(); // من قام بتعديل بيانات المشروع على النظام
            $table->string('last_edit_by_user')->nullable(); // من قام بتعديل بيانات المشروع على النظام
            // -----------------------------
            $table->bigInteger('owner_id');
            $table->bigInteger('owner_national_id');
            $table->string('owner_type'); // فرد - شركة - ورثة - وقف - جهة 
            $table->string('owner_name_ar');
            $table->string('owner_name_en')->nullable();
            $table->string('owner_main_mobile_no')->nullable();
            $table->text('extra_owners_list')->nullable();
            $table->text('extra_owners_info')->nullable();
            // -----------------------------
            $table->bigInteger('representative_id')->nullable();
            $table->bigInteger('representative_national_id')->nullable();
            $table->string('representative_type')->nullable(); // وكيل شرعي - مفوض - ناظر الوقف - ولي على قصر - 
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
            $table->string('project_name_ar')->nullable();
            $table->string('project_name_en')->nullable();
            $table->string('project_type')->nullable();
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
            $table->string('project_manager')->nullable();
            $table->string('project_coordinator')->nullable();
            // -----------------------------
            $table->string('arch_designed_by')->nullable();
            $table->string('elevation_designed_by')->nullable();
            $table->string('str_designed_by')->nullable();
            $table->string('san_designed_by')->nullable();
            $table->string('elec_designed_by')->nullable();
            $table->string('fire_fighting_designed_by')->nullable();
            $table->string('fire_alarm_designed_by')->nullable();
            $table->string('fire_escape_designed_by')->nullable();
            $table->string('tourism_designed_by')->nullable();
            $table->string('interior_designed_by')->nullable();
            $table->string('landscape_designed_by')->nullable();
            $table->string('surveyed_by')->nullable();
            // -----------------------------
            $table->string('main_draftsman')->nullable();
            $table->string('draftsman_1')->nullable();
            $table->text('draftsman_1_mission')->nullable();
            $table->string('draftsman_2')->nullable();
            $table->text('draftsman_2_mission')->nullable();
            $table->string('draftsman_3')->nullable();
            $table->text('draftsman_3_mission')->nullable();
            $table->string('draftsman_4')->nullable();
            $table->text('draftsman_4_mission')->nullable();
            $table->string('draftsman_5')->nullable();
            $table->text('draftsman_5_mission')->nullable();
            $table->string('draftsman_6')->nullable();
            $table->text('draftsman_6_mission')->nullable();
            $table->string('draftsman_7')->nullable();
            $table->text('draftsman_7_mission')->nullable();
            $table->string('draftsman_8')->nullable();
            $table->text('draftsman_8_mission')->nullable();
            $table->string('draftsman_9')->nullable();
            $table->text('draftsman_9_mission')->nullable();
            $table->text('extra_draftsman_details')->nullable();
            // -----------------------------
            $table->text('contracts_list_names')->nullable();
            $table->bigInteger('total_project_price')->nullable();
            $table->bigInteger('total_project_cost')->nullable();






            // -----------------------------
            $table->text('general_notes')->nullable();

            // -----------------------------
            $table->bigInteger('municipality_branche_id');
            $table->bigInteger('neighbor_id');
            $table->bigInteger('plan_id');
            $table->bigInteger('district_id');
            $table->bigInteger('street_id');
            $table->bigInteger('plot_id');
            $table->bigInteger('plot_no');
            $table->bigInteger('deed_id');
            $table->bigInteger('deed_no');





            $table->string('total_area')->nullable();

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
