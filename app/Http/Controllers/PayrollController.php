<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\PayrollDeduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function list(){
        
        $emp = Employee::all();
        $dept = Department::all();

        // $id = auth()->user()->id;
        // $encrypt = Crypt::encryptString($id);
        // $decrypt = Crypt::decryptString($encrypt);
        return view('hr.payroll-list', compact('dept','emp'));
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

    
}
