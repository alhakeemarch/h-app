<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->references('id')->on('invoices');
            // -----------------------------
            $table->string('item_model')->nullable();
            $table->string('item_model_id')->nullable();
            // -----------------------------
            $table->integer('item_sort_order')->nullable();
            // -----------------------------
            $table->string('item_name_ar')->nullable();
            $table->string('item_name_en')->nullable();
            $table->integer('item_quantity')->default(1);
            // -----------------------------
            $table->decimal('item_price', 12, 2)->nullable();
            $table->decimal('item_vat_percentage', 12, 2)->nullable();
            $table->decimal('item_vat_value', 12, 2)->nullable();
            $table->decimal('item_price_withe_vat', 12, 2)->nullable();
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
        Schema::dropIfExists('invoice_items');
    }
}
