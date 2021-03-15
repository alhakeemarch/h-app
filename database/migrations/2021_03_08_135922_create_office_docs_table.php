<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficeDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('office_docs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_data_id')->references('id')->on('office_data');
            $table->string('number')->nullable();
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('issue_place')->nullable();
            $table->string('organization_name_ar')->nullable();
            $table->string('organization_name_en')->nullable();
            $table->string('base_url')->nullable();
            $table->string('doc_name')->nullable();
            $table->string('doc_type')->nullable();
            $table->string('full_url')->nullable();
            $table->boolean('is_active')->nullable()->default(TRUE);


            // =============================
            // -----------------------------
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            // -----------------------------
            $table->bigInteger('created_by_id')->references('id')->on('users');
            $table->bigInteger('last_edit_by_id')->nullable()->references('id')->on('users');
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
        Schema::dropIfExists('office_docs');
    }
}
