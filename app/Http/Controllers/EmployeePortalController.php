<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeePortalController extends Controller
{
    public function portal(){

        return view('employee.portal');
    }
}
