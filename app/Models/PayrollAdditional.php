<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollAdditional extends Model
{
   
    use HasFactory, SoftDeletes;
    protected $table = "payroll_additional";
    protected $fillable = [
        'amount',
        'status',
        'due'
    ];

    public function allowance_info(){
        return $this->belongsTo(Allowance::class,'allowance_id');
    }

    public function employee_info(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
