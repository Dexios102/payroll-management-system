<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Allowance;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    public function list(){
        $all = Allowance::all();
        $alldeleted = Allowance::onlyTrashed()->get();
        return view('hr.allowance-list', compact('all', 'alldeleted'));
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

    public function modal($id){

        $all = Allowance::find($id);

        $all_arr = array(
            "id" => $all->id,
            "code" => $all->code,
            "name" => $all->name,
            "type" => $all->type,
            "description" => $all->description,
        );

        return $all_arr;
    }

    public function update(Request $request){
        $id = $request->input('id2');

        $ded = Allowance::find($id);
        $ded->name = $request->input('name2');
        $ded->description = $request->input('description2');
        $ded->code = $request->input('code2');
        
        $ded->type = $request->input('type2');

        $ded->save();

        return back()->with('success','Update Successfully!');
    }

    public function deleteModal($id){
        $all = Allowance::find($id);
        $all_arr = array(
            "id" => $all->id,
        );
    
        return $all_arr;
      }
    
public function delete(Request $request, $id){
            
    $id = $request->input('allowance_id');

    $all = Allowance::find($id);
    $all->delete();

    return back()->with('success','Deleted Succesfully');
  }
}
