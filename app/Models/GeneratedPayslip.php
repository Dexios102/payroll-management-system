<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedPayslip extends Model
{
    use HasFactory;
    protected $table = 'generated_payslips';
    protected $fillable = [
        'employee_id',
        'employee_name',
        'department',
        'payroll_date',
        'absents',
        'late_hours',
        'late_minutes',
        'salary',
        'additional',
        'total_net',

    ];
}