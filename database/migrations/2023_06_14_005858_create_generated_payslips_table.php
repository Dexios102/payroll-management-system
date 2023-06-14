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
        Schema::create('generated_payslips', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('department')->nullable();
            $table->string('payroll_date')->nullable();
            $table->string('absents')->nullable();
            $table->string('late_hours')->nullable();
            $table->string('late_minutes')->nullable();
            $table->string('total_deduction')->nullable();
            $table->string('salary')->nullable();
            $table->string('additional')->nullable();
            $table->string('total_net')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_payslips');
    }
};