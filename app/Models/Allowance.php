<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allowance extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "allowance";
    protected $fillable = [
        'name',
        'description',
        'code',
        'type'
    ];
}
