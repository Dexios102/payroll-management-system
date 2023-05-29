<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Deduction;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    public function list(){

        $ded = Deduction::all();
        $deducdeleted = Deduction::onlyTrashed()->get();
        return view('hr.deduction-list', compact('ded', 'deducdeleted'));
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

    public function modal($id){

        $ded = Deduction::find($id);

        $ded_arr = array(
            "id" => $ded->id,
            "code" => $ded->code,
            "name" => $ded->name,
            "type" => $ded->type,
            "minimum" => $ded->minimum_loan,
            "description" => $ded->description,
        );

        return $ded_arr;
    }

    public function update(Request $request){
        $id = $request->input('id2');

        $ded = Deduction::find($id);
        $ded->name = $request->input('name2');
        $ded->description = $request->input('description2');
        $ded->code = $request->input('code2');
        $ded->minimum_loan = $request->input('minimum2');
        $ded->type = $request->input('type2');

        $ded->save();

        return back()->with('success','Update Successfully!');
    }


    public function deleteModal($id){
        $ded = Deduction::find($id);
        $ded_arr = array(
            "id" => $ded->id,
        );
    
        return $ded_arr;
      }
    
      public function delete(Request $request, $id){
    
        $id = $request->input('deduction_id');
    
        $ded = Deduction::find($id);
        $ded->delete();
    
        return back()->with('success','Deleted Succesfully');
      }

    public function restore($id){

        $ded = Deduction::onlyTrashed()->where('id',$id)->first();
        $ded->restore();
        return back()->with('success','Restored Succesfully! ');
    }
}
