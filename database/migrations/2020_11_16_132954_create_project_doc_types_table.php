<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectDocTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_doc_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('view_template')->nullable();
            $table->string('header_foooter_template')->nullable();
            // -----------------------------
            $table->boolean('is_in_quick_add')->nullable()->default(true);
            // -----------------------------
            $table->boolean('is_public')->nullable()->default(true);
            $table->boolean('has_barcode')->nullable()->default(true);



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
        Schema::dropIfExists('project_doc_types');
    }



    // INSERT INTO `project_doc_types` (`id`, `name_ar`, `name_en`, `title`, `description`, `view_template`, `header_foooter_template`, `is_in_quick_add`, `is_public`, `has_barcode`, `notes`, `private_notes`, `created_by_id`, `last_edit_by_id`, `deleted_at`, `created_at`, `updated_at`) VALUES (NULL, 'تفويض', NULL, 'تفويض', NULL, 'projectDoc.tafweed', 'hakeem_header_footer', '1', '1', '1', NULL, NULL, '1', NULL, NULL, CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP()) 



}
