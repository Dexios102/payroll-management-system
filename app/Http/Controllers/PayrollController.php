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
        $decrypt = Crypt::decrypt($id);
        $emp = Employee::find($decrypt);
        $dept = Department::all();
        $ded = Deduction::where('type','!=','fixed')->get();
        $fixed_deduc = FixedDeduction::all();
        $p_dec = PayrollDeduction::with(['deduction_info','employee_info'])->where('status','!=','fixed')->where('employee_id',$decrypt)->get();
        $f_dec = PayrollDeduction::with(['deduction_info','employee_info'])->where('status','fixed')->where('employee_id',$decrypt)->get();
        $f_count = $f_dec->count();
        return view('hr.payroll-checkdeduction', compact('dept','emp','fixed_deduc','ded','p_dec','f_dec','f_count'));
    }

    public function checkPayroll($id){
        $decrypt= Crypt::decrypt($id);
        $emp = Employee::find($decrypt);
        $fixed_deduc = FixedDeduction::all();
        return view('hr.payroll-check', compact('emp','fixed_deduc'));
    }
    

    public function deductionSave(Request $request){

    $id = $request->input('employee_id');
    $emp_rate = Employee::find($id)->first('monthly_rate');

        

        $ded2 = new PayrollDeduction();
        $ded2->employee_id = $request->input('employee_id');
        $ded2->deduction_id = $request->input('deduction');
        

        $ded2->total_amount = $request->input('total_amount');
        $ded2->balance = $request->input('total_amount');
        
        if(!empty($request->input('percentage'))){
            $ded2->interest = $request->input('percentage');
            $m_deduction = ($request->input('percentage')/100) * $request->input('total_amount');
            $ded2->monthly_deduction = (string)$m_deduction;
        }
        else{
            $ded2->interest = 0;
            $ded2->monthly_deduction = 0;
        }
        
        $ded2->status = "new";
        $ded2->save();

        return back()->with('success','New Deduction Saved!');

    }

    public function deductionUpdate(Request $request, $id){
       
        $ded = PayrollDeduction::find($id);
        $inputname = "f_deduction".$id;
        $ded->monthly_deduction = $request->input($inputname);
        $ded->save();

        
        return back()->with('success','Updated!') ;

    }




    public function fixedDeductionSave($id){
        $fixed_deduction = Deduction::where('type','fixed')->get();
        $emp_rate = Employee::find($id)->get('monthly_rate');
        
        // foreach($fixed_deduction as $item){

        //     $ded2 = new PayrollDeduction();
        //     $ded2->employee_id = $id;
        //     $ded2->deduction_id = $item->id;
        //     $ded2->total_amount = "0";
        //     $ded2->balance = "0";
        //     $ded2->interest = $item->percentage;
        //     $ded2->monthly_deduction = $emp_rate;
        //     $ded2->status = "fixed";
        //     $ded2->save();
            

        // }
        
                
        
        return $id;
    }
}
