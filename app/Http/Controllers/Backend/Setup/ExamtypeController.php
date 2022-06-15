<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\ExamType;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class ExamtypeController extends Controller
{
    public function ExamtypeView(){
        $examtype=ExamType::all();
        return view('backend.setup.exam_type.exam_type_view',compact('examtype'));
    }

    public function ExamtypeAdd(){
        return view('backend.setup.exam_type.exam_type_add');

    }
    public function ExamtypeStore(Request $request){
        $validated = $request->validate([
            'exam_type' => 'required|unique:exam_types,exam_type',
        ]);
        $data=new ExamType();
        $data->exam_type=$request->exam_type;
        $data->save();
        $notification = array(
            'message' => 'Successfully Exam type insert',
            'alert-type' => 'success'
        );
        return redirect()->route('examtype.view')->with($notification);
    }
    public function ExamtypeEdit($id){
        $examtype=ExamType::find($id);
            return view('backend.setup.exam_type.exam_type_edit',compact('examtype'));

    }

    public function ExamtypeUpdate( Request $request,$id){
        $data=ExamType::find($id);
        $data->exam_type=$request->exam_type;
        $data->save();
        $notification = array(
            'message' => 'Successfully Exam type Update',
            'alert-type' => 'success'
        );
        return redirect()->route('examtype.view')->with($notification);

    }

    public function ExamtypeDelete($id){
        $data=ExamType::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully Exam type Delete',
            'alert-type' => 'error'
        );
        return redirect()->route('examtype.view')->with($notification);
    }
}
