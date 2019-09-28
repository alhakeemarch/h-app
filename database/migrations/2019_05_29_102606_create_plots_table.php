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

            $table->string('deed_no')->unique();
            $table->date('deed_date');

            $table->string('plot_no');
            $table->string('plan_no');
            $table->string('plan_name');
            $table->string('area');
            $table->string('district');
            $table->string('municipality_branch');
            $table->string('road_code');
            $table->string('road_name');


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
