<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FixedDeduction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "fixed_deduction";
    protected $fillable = [
        'name',
        'description',
        'percentage',
    ];
}
