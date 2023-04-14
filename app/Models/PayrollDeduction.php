<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollDeduction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payroll_deduction";
    protected $fillable = [
        'total_amount',
        'interest',
        'status'
    ];

    public function deduction_info(){
        return $this->belongsTo(Deduction::class,'deduction_id');
    }

    public function employee_info(){
        return $this->belongsTo(Employee::class,'employee_id');
    }

}
