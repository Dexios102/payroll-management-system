<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deduction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "deduction";
    protected $fillable = [
        'name',
        'description',
        'code',
        'minimum_loan',
        'type'
    ];
}
