<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('invoice_no')->unique();
            $table->bigInteger('invoice_no_prefix');
            $table->foreignId('project_id')->nullable()->references('id')->on('projects');
            $table->foreignId('person_id')->nullable()->references('id')->on('people');
            $table->foreignId('issued_by_id')->nullable()->references('id')->on('people');
            // -----------------------------
            $table->string('h_date')->nullable();
            $table->string('g_date')->nullable();
            // -----------------------------
            $table->boolean('is_cash')->default(false);
            $table->boolean('is_credit')->default(true);
            // -----------------------------
            $table->decimal('total_cost', 12, 2)->nullable();
            $table->decimal('vat_percentage', 12, 2)->nullable();
            $table->decimal('total_vat_value', 12, 2)->nullable();
            $table->decimal('total_price_withe_vat', 12, 2)->nullable();
            // -----------------------------
            $table->bigInteger('print_count')->default(0);
            // -----------------------------
            $table->longText('text')->nullable();
            $table->longText('html')->nullable();
            $table->longText('html_1')->nullable();
            // -----------------------------




            // =============================
            // -----------------------------
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            // -----------------------------
            $table->bigInteger('created_by_id')->references('id')->on('users');
            $table->bigInteger('last_edit_by_id')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
