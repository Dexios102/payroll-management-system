<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    public function list(){

        $ded = Deduction::all();
        return view('hr.deduction-list', compact('ded'));
    }

    public function save(Request $request){

        $ded = new Deduction();
        $ded->name = $request->input('name');
        $ded->description = $request->input('description');
        $ded->code = $request->input('code');
        $ded->minimum_loan = $request->input('minimum');
        $ded->type = $request->input('type');
        $ded->save();

        return back()->with('success','Successfully Saved!');
    }
}
