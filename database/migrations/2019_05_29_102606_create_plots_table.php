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
            
            $table->string('deed_no');
            $table->date('deed_date');

            $table->string('plot_no');
            
            // رقم المخطط
            // إسم المخطط
            // المنطقة
            // الحي
            // البلدية
            // رقم الشارع
            // إسم الشارع
            // المساحة
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
