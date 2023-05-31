<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Allowance;
use App\Models\Deduction;
use App\Models\Department;
use App\Models\Employee;
use App\Models\FixedDeduction;
use App\Models\PayrollAdditional;
use App\Models\PayrollDeduction;
use App\Models\PayrollFixedDeduction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PrintController extends Controller
{
    
    public function payslipPayslipTable($id){

        $decryptID= Crypt::decrypt($id);
        $emp = Employee::find($decryptID);
        $fixed_deduc = PayrollFixedDeduction::with(['deduction_info'])->where('employee_id',$decryptID)
        ->withoutTrashed()->get();

        $other_ded = PayrollDeduction::where('employee_id',$decryptID)
            ->where('status','active')
            ->with(['deduction_info','employee_info'])->withoutTrashed()->get();
        $total_ded = PayrollDeduction::where('employee_id',$decryptID)
            ->where('status','active')
            ->with(['deduction_info','employee_info'])->withoutTrashed()->sum('monthly_deduction');

            $dept = Department::all();
            $ded = Deduction::where('type','!=','fixed')->withoutTrashed()->get();
            $fixed_deduc2 = FixedDeduction::all();
            $p_dec = PayrollDeduction::with(['deduction_info','employee_info'])
            ->where('status','!=','fixed')->where('employee_id',$decryptID)->withoutTrashed()->get();
    
            $f_dec = PayrollFixedDeduction::with(['deduction_info','employee_info'])->where('employee_id',$decryptID)
            ->where('status','active')->withoutTrashed()->get();
            $f_ded_all = PayrollFixedDeduction::with(['deduction_info','employee_info'])->where('employee_id',$decryptID)
            ->withoutTrashed()->get();
            $f_count = $f_dec->count();

            $allowance = Allowance::withoutTrashed()->get();

            $payrollAdd_all = PayrollAdditional::where('employee_id',$decryptID)->withoutTrashed()->get();
            

            $total_f = $f_dec->sum('monthly_deduction');

        $payrollAdd = PayrollAdditional::where('employee_id',$decryptID)->where('status','active')->withoutTrashed()->get();
        $total_add = $payrollAdd->sum('amount');
        $add_count = $payrollAdd->count();
        $total_net = ($emp->monthly_rate +  $total_add) - ($total_ded + $total_f) ;
        $half_net = $total_net / 2 ;

        $pdf_name = $emp->fullname . ' Payroll' . Carbon::now(). '.pdf';


        $pdf = PDF::loadView('print.payslip',compact('emp','fixed_deduc','other_ded', 'total_ded','dept',
        'ded','fixed_deduc2','p_dec','f_dec','f_count','allowance','payrollAdd','total_add','add_count','total_f',
        'total_net','half_net','f_ded_all','payrollAdd_all'))->setPaper('legal', 'landscape');

        return $pdf->stream();
    }
}
