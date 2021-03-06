<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->foreignId('invoice_id')->nullable()->references('id')->on('invoices');
            // -----------------------------
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->string('description')->nullable();
            $table->string('date')->nullable();
            // -----------------------------
            $table->boolean('is_in_quotation')->nullable()->default(TRUE);
            $table->boolean('is_in_invoice')->nullable()->default(false);
            // -----------------------------
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('vat_percentage', 12, 2)->nullable();
            $table->decimal('vat_value', 12, 2)->nullable();
            $table->decimal('price_withe_vat', 12, 2)->nullable();
            // -----------------------------
            $table->decimal('tax_1', 12, 2)->nullable();
            $table->decimal('tax_2', 12, 2)->nullable();
            $table->decimal('tax_3', 12, 2)->nullable();
            $table->decimal('tax_4', 12, 2)->nullable();
            $table->decimal('tax_5', 12, 2)->nullable();
            $table->decimal('price_withe_vat_and_taxes', 12, 2)->nullable();
            // -----------------------------




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
        Schema::dropIfExists('project_services');
    }
}
