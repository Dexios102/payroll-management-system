<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
  
    public function list(){
        $dept = Department::all();
        $pos = Position::with('division_info')->orderBy('division')->get();
        $emp = Employee::all();

        return view('hr.employee-list', compact('dept','pos','emp'));
    }

    public function saveEmployee(Request $request){

        $emp = new Employee();
        $emp->first_name = $request->input('f_name');
        $emp->middle_name = $request->input('m_name');
        $emp->last_name = $request->input('l_name');
        $emp->suffix = $request->input('suffix');
        $emp->contact = $request->input('contact');
        $emp->email = $request->input('email');
        $emp->gender = $request->input('gender');
        $emp->department = $request->input('department');
        $emp->position = $request->input('position');
        $emp->birthdate = $request->input('birthdate');
        $emp->birthplace = $request->input('birthplace');
        $emp->address = $request->input('address');
        $emp->employee_type = $request->input('employee_type');
        $emp->status = $request->input('status');
        $emp->save();

        return back()->with('success','Saved Successfully');
    }
}
