<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->key();
            $table->foreignId('project_id')->nullable()->references('id')->on('projects');
            // -----------------------------
            $table->string('deed_no')->unique();
            $table->string('deed_date')->nullable();
            // -----------------------------
            $table->string('plot_no');
            $table->string('area')->nullable();
            $table->string('allowed_building_ratio_id')->nullable();
            $table->string('allowed_building_height_id')->nullable();
            $table->string('allowed_usage_id')->nullable();
            // -----------------------------
            $table->foreignId('municipality_branch_id')->nullable()->references('id')->on('municipality_branches')->unsigned();
            $table->foreignId('neighbor_id')->nullable()->references('id')->on('neighbors')->unsigned();
            $table->foreignId('plan_id')->nullable()->references('id')->on('plans')->unsigned();
            $table->foreignId('district_id')->nullable()->references('id')->on('districts')->unsigned();
            $table->foreignId('street_id')->nullable()->references('id')->on('streets')->unsigned();
            // -----------------------------
            $table->foreignId('total_area')->nullable();
            // -----------------------------
            $table->string('x_coordinate')->nullable();
            $table->string('y_coordinate')->nullable();
            // -----------------------------
            $table->string('north_border_name')->nullable();
            $table->string('north_border_length')->nullable();
            $table->string('north_border_setback')->nullable();
            $table->string('north_border_cantilever')->nullable();
            $table->string('north_border_chamfer')->nullable();
            $table->string('north_border_note')->nullable();

            $table->string('south_border_name')->nullable();
            $table->string('south_border_length')->nullable();
            $table->string('south_border_setback')->nullable();
            $table->string('south_border_cantilever')->nullable();
            $table->string('south_border_chamfer')->nullable();
            $table->string('south_border_note')->nullable();

            $table->string('east_border_name')->nullable();
            $table->string('east_border_length')->nullable();
            $table->string('east_border_setback')->nullable();
            $table->string('east_border_cantilever')->nullable();
            $table->string('east_border_chamfer')->nullable();
            $table->string('east_border_note')->nullable();

            $table->string('west_border_name')->nullable();
            $table->string('west_border_length')->nullable();
            $table->string('west_border_setback')->nullable();
            $table->string('west_border_cantilever')->nullable();
            $table->string('west_border_chamfer')->nullable();
            $table->string('west_border_note')->nullable();
            // -----------------------------


            // =============================
            // -----------------------------
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
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
        Schema::dropIfExists('plots');
    }
}
