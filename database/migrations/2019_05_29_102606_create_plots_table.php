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
            $table->bigIncrements('id');
            $table->bigInteger('project_id')->references('id')->on('projects')->nullable();
            // -----------------------------
            $table->bigInteger('aad_user_id')->references('id')->on('users');
            $table->string('add_user_name')->references('user_name')->on('users');
            $table->bigInteger('last_edit_user_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_user_name')->references('user_name')->on('users')->nullable();
            // -----------------------------
            $table->string('deed_no')->unique();
            $table->date('deed_date')->nullable();
            // -----------------------------
            $table->string('plot_no');
            $table->string('area')->nullable();
            $table->string('allowed_building_ratio')->nullable();
            $table->string('allowed_building_height')->nullable();
            $table->string('allowed_usage')->nullable();
            // -----------------------------
            $table->string('plan_id')->references('id')->on('plans')->nullable(); 
            // -----------------------------
            $table->string('district_id')->references('id')->on('districts')->nullable(); 
            // -----------------------------
            $table->string('municipality_branch_id')->references('id')->on('municipality_branchs')->nullable(); 
            // -----------------------------
            $table->string('street_id')->references('id')->on('streets')->nullable(); 
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
            $table->longText('notes')->nullable();
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
