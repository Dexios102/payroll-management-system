<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollFixedDeduction extends Model
{
    
    use HasFactory, SoftDeletes;
    protected $table = "payroll_fixed_deduction";
    protected $fillable = [
        'total_amount',
        'interest',
        'status',
        'monthly_deduction',
        'balance',
        'deleted_at'


    ];

    public function deduction_info(){
        return $this->belongsTo(FixedDeduction::class,'deduction_id');
    }

    public function employee_info(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
