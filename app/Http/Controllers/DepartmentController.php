<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{
    public function list(){

        $dp = DB::table('department')->get();
        return view('hr.department-list', compact('dp'));
    }

    public function save(Request $request){
        
        $dept = new Department();
        $dept->code = $request->input('code');
        $dept->division = $request->input('division');
        $dept->description = $request->input('description');
        $dept->floor = $request->input('floor');
        $dept->save();


        return back()->with('success','Saved Succesful');


    }
}
