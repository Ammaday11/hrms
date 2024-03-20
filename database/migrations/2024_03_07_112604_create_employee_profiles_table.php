<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('NID')->unique()->nullable();
            $table->string('parmanant_address')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('no_kids')->nullable();
            $table->string('emg_name1')->nullable();
            $table->string('emg_relation1')->nullable();
            $table->string('emg_phone1')->nullable();
            $table->string('emg_name2')->nullable();
            $table->string('emg_relation2')->nullable();
            $table->string('emg_phone2');
            $table->string('bank_name');
            $table->string('bank_acc');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_profiles');
    }
};
