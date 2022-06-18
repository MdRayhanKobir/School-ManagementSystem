<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollGenerateController extends Controller
{
    public function StudentRollGenView(){
        $yeardata       =   StudentYear::all();
        $classdata      =   StudentClass::all();
        return view('backend.student.student_reg.student_roll_view',compact('yeardata','classdata'));
    }


    public  function StudentRollGenGet(Request $request){
        // dd( 'ok done');
        $student_roll_data=AssignStudent::with(['student'])->where('year_id',$request->year_id)
        ->where('class_id',$request->class_id)->get();
         return response()->json($student_roll_data);
    }



    public function StudentRollStore(Request $request){

        $year_id=$request->year_id;
        $class_id=$request->class_id;
        if($request->student_id !=null){
            for($i=0;$i<count($request->student_id);$i++){
                AssignStudent::where('year_id',$request->year_id)
                ->where('class_id',$request->class_id)
                ->where('student_id',$request->student_id[$i])
                ->update(['roll'=>$request->roll[$i]]);
            }
        }else{
            $notification = array(
                'message' => 'Sorry no have any data',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $notification = array(
            'message' => 'Student roll generate successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('student.roll.generate.view')->with($notification);

    }


}
