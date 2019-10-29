<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            // -----------------------------
            $table->bigInteger('created_by_id');
            $table->string('created_by_name');
            $table->bigInteger('last_edit_by_id')->nullable();
            $table->string('last_edit_by_name')->nullable();

            // -----------------------------
            $table->bigInteger('owner_id');
            $table->bigInteger('owner_national_id');
            $table->string('owner_type');
            $table->string('owner_name_ar');
            $table->string('owner_name_en')->nullable();
            $table->text('extra_owners_list')->nullable();
            // -----------------------------
            // ممثل المالك
            // الوكيل الشرعي
            // ممثلين ومراجعين أخرون
            // -----------------------------
            $table->string('project_name_ar')->nullable();
            $table->string('project_name_en')->nullable();
            $table->string('project_type')->nullable();
            $table->string('project_hight')->nullable();
            $table->string('project_str_hight')->nullable();
            $table->text('extra_details')->nullable();

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
