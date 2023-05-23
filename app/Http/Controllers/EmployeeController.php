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
        $emp = Employee::where('isActive','1')->get();
        $ded = Deduction::all();
        $emp_deduc = PayrollDeduction::with('employee_info','deduction_info')->get();
        $empdeleted = Employee::onlyTrashed()->get();
        return view('hr.employee-list', compact('dept','pos','emp','ded','emp_deduc', 'empdeleted'));
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
        $emp->daily_rate = $request->input('daily_rate');
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
        return back()->with('success','Success!');

    }

    
    public function modal($id){
        $emp = Employee::find($id);
        $emp_arr = array(
            "id" => $emp->id,
            "f_name" => $emp->first_name,
            "m_name" => $emp->middle_name,
            "l_name" => $emp->last_name,
            "suffix" => $emp->suffix,
            "m_rate" => $emp->monthly_rate,
            "contact" => $emp->contact,
            "email" => $emp->email,
            "gender" => $emp->gender,
            "department" => $emp->department,
            "position" => $emp->position,
            "daily_rate" => $emp->daily_rate,
            "birthdate" => $emp->birthdate,
            "birthplace" => $emp->birthplace,
            "address" => $emp->address,
            "employee_type" => $emp->employee_type,
            "status" => $emp->status,

        );

        return $emp_arr;
    }

    public function updateEmployee(Request $request){
        $id = $request->input('id2');

       
        $emp = Employee::find($id);
        $emp->first_name = $request->input('f_name2');
        $emp->middle_name = $request->input('m_name2');
        $emp->last_name = $request->input('l_name2');
        $emp->suffix = $request->input('suffix2');
        $emp->monthly_rate = $request->input('m_rate2');
        
        $emp->contact = $request->input('contact2');
        $emp->email = $request->input('email2');
        $emp->gender = $request->input('gender2');
        $emp->department = $request->input('department2');
        $emp->daily_rate = $request->input('daily_rate2');
        $emp->position = $request->input('position2');
        $emp->birthdate = $request->input('birthdate2');
        $emp->birthplace = $request->input('birthplace2');
        $emp->address = $request->input('address2');
        $emp->employee_type = $request->input('employee_type2');
        $emp->status = $request->input('status2');
        $emp->save();

        return back()->with('success','Updated Successfully');
    }

  public function deleteModal($id){
    $emp = Employee::find($id);
    $emp_arr = array(
        "id" => $emp->id,
        "f_name" => $emp->first_name,
        "m_name" => $emp->middle_name,
        "l_name" => $emp->last_name,
    );

    return $emp_arr;


  }

  public function deleteEmployee(Request $request){

    $id = $request->input('id2');

    $emp = Employee::find($id);
    $emp->isActive = "0";
    $emp->save();

    return back()->with('success','Removed Succesfully');
  }

  public function archive(){
    $dept = Department::all();
    $pos = Position::with('division_info')->orderBy('division')->get();
    $emp = Employee::where('isActive','0')->get();
    $ded = Deduction::all();
    $emp_deduc = PayrollDeduction::with('employee_info','deduction_info')->get();
    return view('hr.employee-archive', compact('dept','pos','emp','ded','emp_deduc'));
}

public function delete(Request $request, $id){
            
    $id = $request->input('emid');

    $all = Employee::find($id);
    $all->delete();

    return back()->with('success','Deleted Succesfully');
  }
}
