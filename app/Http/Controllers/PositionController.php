<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function list(){

        $dept = Department::all();
        $pos = Position::with('division_info')->get();
      

        return view('hr.position-list', compact('dept','pos'));
    }

    public function save(Request $request){

        $pos = new Position();
        $pos->name = $request->input('name');
        $pos->division = $request->input('division');
        $pos->description = $request->input('description');
        $pos->save();

        return back()->with('success','Saved Successful');
    }
}
