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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('contact')->nullable();
            $table->string('monthly_rate')->nullable();
            $table->string('email');
            $table->string('gender');
            $table->string('department');
            $table->string('position');
            $table->date('birthdate');
            $table->string('birthplace');
            $table->string('address');
            $table->string('employee_type');
            $table->string('status');
            $table->string('isActive')->default('1');




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
