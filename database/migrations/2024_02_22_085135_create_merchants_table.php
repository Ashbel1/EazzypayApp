<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); 
            $table->string('firstname', 64)->nullable();
            $table->string('lastname', 64)->nullable();
            $table->string('account', 16)->nullable(); 
            $table->decimal('deposit', 15, 5)->nullable();
            $table->decimal('commission', 15, 5)->nullable();
            $table->timestamp('registration_date')->nullable();
            $table->timestamp('first_use')->nullable();
            $table->timestamp('last_use')->nullable();
            $table->string('landline', 16)->nullable();
            $table->string('cellphone', 16)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('street', 255)->nullable();
            $table->integer('account_manager_id')->nullable();
            $table->integer('agent_class_of_service_id')->nullable();
            $table->string('short_code', 6)->nullable();
            $table->string('bank_name', 45)->nullable();
            $table->string('bank_account', 45)->nullable();
            $table->string('suburb', 64)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('type', 64)->nullable();
            $table->string('company_name', 64)->nullable();
            $table->string('director_full_name_1', 64)->nullable();
            $table->string('director_full_name_2', 64)->nullable();
            $table->string('director_full_name_3', 64)->nullable();
            $table->string('director_full_name_4', 64)->nullable();
            $table->string('director_id_number_1', 64)->nullable();
            $table->string('director_id_number_2', 64)->nullable();
            $table->string('director_id_number_3', 64)->nullable();
            $table->string('director_id_number_4', 64)->nullable();
            $table->string('category_code', 32)->nullable();
            $table->string('tax_clearance', 64)->nullable();
            $table->string('bank_branch_code', 64)->nullable();
            $table->string('bank_account_name', 64)->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->string('logo', 16)->nullable();
            $table->decimal('mdr', 5, 3)->default(1.000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
}