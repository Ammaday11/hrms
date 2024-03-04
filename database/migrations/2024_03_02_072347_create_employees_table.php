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
            $table->foreignID('designation_id');
            $table->date('joined_date');
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
