<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function StudentClass(){
        $classdata=StudentClass::all();
        return view('backend.setup.student_class.student_class_view',compact('classdata'));
    }

    public function StudentClassAdd(){
        return view('backend.setup.student_class.class_add');
    }

    public function StudentClassStore(Request $request){
        $validated = $request->validate([
            'class'=>'required|unique:student_classes,class',
        ]);

        $data= new StudentClass();
        $data->class=$request->class;
        $data->save();
        $notification=array(
            'message'=>'Successfully Class insert',
            'alert-type'=>'success'
        );

        return redirect()->route('student.class')->with($notification);
    }

    public function StudentClassEdit($id){
        $classdata=StudentClass::find($id);
        return view('backend.setup.student_class.class_edit',compact('classdata'));
    }

    public function StudentClassUpdate(Request $request,$id){
        $data=StudentClass::find($id);
        $data->class=$request->class;
        $data->save();
        $notification=array(
            'message'=>'Successfully Class Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('student.class')->with($notification);
    }

    public function StudentClassDelete($id){
        $classdata=StudentClass::find($id);
        $classdata->delete();

        $notification=array(
            'message'=>'Successfully Class Deleted',
            'alert-type'=>'success'
        );

        return redirect()->route('student.class')->with($notification);

    }
}
