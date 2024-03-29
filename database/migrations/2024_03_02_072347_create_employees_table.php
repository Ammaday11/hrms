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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employeeID')->unique();
            $table->string('password');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique()->nullable();
            $table->string('phone');
            $table->foreignID('department_id');
            $table->foreignID('designation_id')->nullable();
            $table->date('joined_date');
            $table->string('NID')->unique()->nullable();
            $table->date('dob')->nullable();
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
            $table->string('emg_phone2')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_acc')->nullable();
            $table->string('bank_acc_name')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
