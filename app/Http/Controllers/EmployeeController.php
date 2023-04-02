<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Models\PayrollDeduction;

class EmployeeController extends Controller
{
  
    public function list(){
        $dept = Department::all();
        $pos = Position::with('division_info')->orderBy('division')->get();
        $emp = Employee::all();
        $ded = Deduction::all();
        $emp_deduc = PayrollDeduction::with('employee_info','deduction_info')->get();
        return view('hr.employee-list', compact('dept','pos','emp','ded','emp_deduc'));
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


    public function empDeduction(Request $request){
        $empDeduc = new PayrollDeduction();
        $empDeduc->employee_id = $request->input_employee_id;
        $empDeduc->deduction_id = $request->deduction_id;
        $empDeduc->total_amount = $request->total_loan;
        $empDeduc->interest = $request->interest;
        $empDeduc->status = "active";
        $empDeduc->save();
        return back()->with('sucsess','Success!');

    }
}
