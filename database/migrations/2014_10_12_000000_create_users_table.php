<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use PhpParser\PrettyPrinter\Standard;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            // -----------------------------
            $table->unsignedInteger('person_id')->references('id')->on('people')->unique();
            $table->unsignedInteger('national_id')->references('national_id')->on('people')->unique();
            // -----------------------------
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_manager')->default(false);
            $table->boolean('is_active')->default(true);
            // -----------------------------
            $table->string('name');
            $table->string('user_name')->unique();
            $table->string('email')->references('email')->on('people')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // -----------------------------
            $table->integer('user_type_id')->default(5)->references('id')->on('user_types');
            $table->string('user_type_name')->default('standard_user')->references('type')->on('user_types');
            // -----------------------------
            $table->integer('user_level')->default(1);
            $table->integer('job_level')->default(1);
            // =============================
            $table->longText('notes')->nullable();
            $table->longText('private_notes')->nullable();
            // -----------------------------
            $table->timestamp('deleted_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
