<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    public function list(){

        return view('hr.deduction-list');
    }
}
