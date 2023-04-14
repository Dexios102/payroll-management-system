<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use App\Models\Department;
use App\Models\Employee;
use App\Models\FixedDeduction;
use App\Models\Payroll;
use App\Models\PayrollDeduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function list(){
        
        $emp = Employee::where('isActive','1')->get();
        $dept = Department::all();

        $fixed_deduc = FixedDeduction::all();
        // $id = auth()->user()->id;
        // $encrypt = Crypt::encryptString($id);
        // $decrypt = Crypt::decryptString($encrypt);
        return view('hr.payroll-list', compact('dept','emp','fixed_deduc'));
    }

    public function deduc($id){
        $employee = Employee::find($id);

        $deduction2 = DB::table('payroll_deduction')->where('employee_id',$id)->get();
       
        $empl_array = array(
            'emp_id' => $employee->id,
            'f_name'  => $employee->first_name, 
            'l_name' =>  $employee->last_name,
            'deduc2' => array($deduction2)
        );
            
        
        return $empl_array ;
    }

    public function monthlyratemodal($id){
        $emp = Employee::find($id);

        $emp_array = array(
            'id' =>  $emp->id,
            'lname' => $emp->last_name,
            'mrate' => $emp->monthly_rate,
        );

        return $emp_array;
    }

    public function mrateupdate(Request $request){
        $id = $request->input('id2');
        $emp = Employee::find($id);
        $emp->monthly_rate = $request->input('mrate2');
        $emp->save();

        return back()->with('success','Updated Succesfully');
    }

    
    public function checkdeduction($id){
        $emp = Employee::find($id);
        $dept = Department::all();
        $ded = Deduction::all();
        $fixed_deduc = FixedDeduction::all();

        return view('hr.payroll-checkdeduction', compact('dept','emp','fixed_deduc','ded'));
    }
    
}
