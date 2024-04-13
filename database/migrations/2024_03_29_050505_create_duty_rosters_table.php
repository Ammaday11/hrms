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
        Schema::create('duty_rosters', function (Blueprint $table) {
            $table->id();
            $table->foreignID('employee_id');
            $table->foreignID('shift_id');
            $table->date('date');
            $table->boolean('locked')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            // $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            // $table->foreign('shift_id')->references('id')->on('shifts')->onDelete('cascade');

            // Add unique constraint to prevent duplicate entries for the same employee and date
            //$table->unique(['employee_id', 'date', 'shift_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duty_rosters');
    }
};
