<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->key();
            // -----------------------------
            $table->string('plan_no')->default('مخطط غير معروف رقمه');;
            $table->string('plan_ar_name')->default('مخطط غير معروف إسمه');
            // -----------------------------
            $table->string('plan_oracle_name')->nullable();
            $table->string('paln_type_code')->nullable();
            $table->string('plan_year')->nullable();
            $table->string('plan_date')->nullable();
            $table->string('office_raster')->nullable();
            $table->string('office_name')->nullable();
            $table->string('dwg_name_amana')->nullable();
            $table->string('plan_dir_amana')->nullable();
            $table->string('status_amana')->nullable();
            $table->string('plan_sources_amana')->nullable();
            $table->string('editor_amana')->nullable();
            $table->string('berauno')->nullable();
            $table->string('land_use_code')->nullable();
            $table->string('land_use')->nullable();
            $table->string('plan_ind')->nullable();
            $table->string('owner_type')->nullable();
            $table->string('num_of_parcel')->nullable();
            $table->string('paln_out_per')->nullable();
            $table->string('gog_loc_code')->nullable();
            $table->string('gog_location')->nullable();
            $table->string('scale')->nullable();

            $table->string('building_area_per')->nullable();
            $table->string('cnt_no')->nullable();
            $table->string('cnt_src')->nullable();
            $table->string('cnt_source')->nullable();
            $table->string('cnt_date')->nullable();
            $table->string('mins_no')->nullable();
            $table->string('mins_date')->nullable();
            $table->text('notes_amana')->nullable();
            $table->string('kar_ok')->nullable();
            $table->string('mi_prinx')->nullable();

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
        Schema::dropIfExists('plans');
    }
}
