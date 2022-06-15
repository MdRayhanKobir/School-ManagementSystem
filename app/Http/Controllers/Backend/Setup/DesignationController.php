<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function DesignationView(){

        $designation=Designation::all();

        return view('backend.setup.designation.designation_view',compact('designation'));
    }

    public function DesignationAdd(){
        return view('backend.setup.designation.designation_add');
    }

    public function DesignationStore(Request $request){

        $validated = $request->validate([
            'designation' => 'required|unique:designations,designation',
        ]);

        $data=new Designation();
        $data->designation=$request->designation;
        $data->save();

        $notification = array(
            'message' => 'Successfully Designation insert',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification );
    }


    public function DesignationEdit($id){

        $designationdata=Designation::find($id);

        return view('backend.setup.designation.designation_edit',compact('designationdata'));

    }



    public function DesignationUpdate(Request $request,$id){

        $data=Designation::find($id);
        $data->designation=$request->designation;
        $data->save();


        $notification = array(
            'message' => 'Successfully Designation Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('designation.view')->with($notification );
    }


    public function DesignationDelete($id){
        $data=Designation::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully Designation  Deleted',
            'alert-type' => 'Warning'
        );

        return redirect()->route('designation.view')->with($notification );
    }

}
