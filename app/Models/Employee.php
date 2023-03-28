<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
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
        'birthdate',
        'birthplace',
        'address',
        'employee_type',
        'status',

    ];
    
}
