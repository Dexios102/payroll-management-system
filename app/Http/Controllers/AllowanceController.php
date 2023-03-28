<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Allowance;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    public function list(){
        $all = Allowance::all();
        return view('hr.allowance-list', compact('all'));
    }

    public function saveAllowance(Request $request){
        $all = new Allowance();
        $all->name = $request->input('name');
        $all->description = $request->input('description');
        $all->code = $request->input('code');
        $all->type = $request->input('type');
        $all->save();

        return back()->with('success','Successfully Saved!');
    }
}
