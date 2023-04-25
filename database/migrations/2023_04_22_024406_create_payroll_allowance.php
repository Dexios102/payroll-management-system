<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\SoftDeletes;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payroll_additional', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('employee')->onDelete('cascade');
            $table->foreignId('allowance_id')->references('id')->on('allowance')->onDelete('cascade');
            $table->string('due')->nullable();
            $table->string('amount')->nullable();
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
        Schema::table('payroll_additional', function (Blueprint $table) {
            Schema::dropIfExists('payroll_additional');
        });
    }
};
