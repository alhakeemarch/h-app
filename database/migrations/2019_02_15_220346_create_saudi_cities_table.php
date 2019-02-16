<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaudiCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saudi_cities', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('ar_region_name');
            $table->string('en_region_name');
            $table->string('ar_city_name');
            $table->string('en_city_name');

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
        Schema::dropIfExists('saudi_cities');
    }
}
