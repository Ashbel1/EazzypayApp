<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('imei', 64)->nullable();
            $table->string('status', 32)->nullable();
            $table->string('name', 255)->nullable();
            $table->timestamp('first_use')->nullable();
            $table->timestamp('last_use')->nullable();
            $table->string('version', 32)->nullable();
            $table->string('pos_sim_number', 16)->nullable();
            $table->string('activation_code', 8)->nullable();
            $table->integer('activation_tries')->nullable();
            $table->integer('agent_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->boolean('dedicated')->default(true)->nullable();
            $table->string('encryption_key', 255)->nullable();
            $table->integer('supervisor_id')->nullable();
            $table->string('terminal_id', 64)->nullable();
            $table->string('imsi_sim', 64)->nullable();
            $table->string('serial_number', 64)->nullable();
            $table->string('pos_type', 16)->nullable();
            // additional fields
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
}