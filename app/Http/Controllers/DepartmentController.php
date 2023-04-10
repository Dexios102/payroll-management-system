<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Position;
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


    public function modal($id){
        $dep = Department::find($id);
        $dep_arr = array(
            "id" => $dep->id,
            "code" => $dep->code,
            "division" => $dep->division,
            "floor" => $dep->floor,
            "description" => $dep->description,
        );

        return $dep_arr;
    }

    public function update(Request $request){
        $id = $request->input('id2');

        $ded = Department::find($id);
        $ded->code = $request->input('code2');
        $ded->floor = $request->input('floor2');
        $ded->division = $request->input('division2');
        $ded->description = $request->input('description2');

        $ded->save();

        return back()->with('success','Update Successfully!');
    }
    
    public function deleteModal($id){
        $data = Department::find($id);
        $data_arr = array(
            "id" => $data->id,
        );
    
        return $data_arr;
      }
    

      public function delete(Request $request){
    
        $id = $request->input('id2');
    
        $all = Department::find($id);
        $all->delete();

        $pos = Position::where('division',$id)->delete();
    
        return back()->with('success','Deleted Succesfully');
      }
}
