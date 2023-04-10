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
        Schema::create('payroll_deduction', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreignId('deduction_id')->references('id')->on('deduction')->onDelete('cascade');
            $table->string('total_amount');
            $table->string('interest')->default('5');
            $table->string('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_deduction');
    }
};
