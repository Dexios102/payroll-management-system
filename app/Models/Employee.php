<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employee';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'contact',
        'email',
        'gender',
        'department',
        'position',
        'daily_rate',
        'birthdate',
        'birthplace',
        'address',
        'employee_type',
        'status',
        'monthly_rate'

    ];
    
}
