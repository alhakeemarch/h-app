<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('project_id')->references('id')->on('projects');
            $table->foreignId('contract_type_id')->references('id')->on('contract_types');
            $table->bigInteger('contract_no')->nullable()->unique();
            $table->bigInteger('contract_no_acc')->nullable()->unique();
            // -----------------------------
            $table->string('period')->nullable();
            $table->string('period_scale')->nullable(); // D, M, Y
            // -----------------------------
            $table->decimal('cost', 12, 2)->nullable();
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
            $table->decimal('visit_fee', 12, 2)->nullable();
            $table->decimal('monthly_fee', 12, 2)->nullable();
            // -----------------------------
            $table->string('date')->nullable();
            $table->longText('fields')->nullable();
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
            $table->string('created_by_name')->references('user_name')->on('users');
            $table->bigInteger('last_edit_by_id')->references('id')->on('users')->nullable();
            $table->string('last_edit_by_name')->references('user_name')->on('users')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
