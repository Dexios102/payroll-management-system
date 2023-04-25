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
        Schema::create('payroll_fixed_deduction', function (Blueprint $table) {
            $table->id();
            $table->foreignID('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreignID('deduction_id')->references('id')->on('fixed_deduction')->onDelete('cascade');
            $table->string('total_amount')->nullable();
            $table->string('monthly_deduction')->nullable();
            $table->string('balance')->nullable();
            $table->string('interest')->default('0')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_fixed_deduction');
    }
};
