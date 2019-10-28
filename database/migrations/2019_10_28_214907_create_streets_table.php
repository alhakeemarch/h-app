<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('code')->default('0');

            $table->string('en_name')->nullable();
            $table->string('ar_name')->default('إسم شارع غير معروف عربي');
            $table->bigInteger('mi_prinx')->nullable();

            $table->string('class')->nullable();
            $table->string('str_width')->nullable();
            $table->string('is_commercial')->nullable();


            // -----------------------------
            $table->bigInteger('aad_user_id');
            $table->string('add_user_name');
            $table->bigInteger('last_edit_user_id')->nullable();
            $table->string('last_edit_user_name')->nullable();

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
        Schema::dropIfExists('streets');
    }
}
