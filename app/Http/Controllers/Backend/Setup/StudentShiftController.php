<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    public function StudentShiftView(){
        $studentshift=StudentShift::all();
        return view('backend.setup.student_shift.student_shift_view',compact('studentshift'));
    }

    public function StudentShiftAdd(){
        return view('backend.setup.student_shift.student_shift_add');
    }

    public function StudentShiftStore(Request $request){
        $validated = $request->validate([
            'shift' => 'required|unique:student_shifts,shift',
        ]);

        $data= new StudentShift();
        $data->shift=$request->shift;
        $data->save();

        $notification = array(
            'message' => 'Successfully Student Shift Insert',
            'alert-type' => 'success'
        );

        return redirect()->route('shift.view')->with($notification);
    }

    public function StudentShiftEdit($id){
        $studentshift=StudentShift::find($id);
        return view('backend.setup.student_shift.student_shift_edit',compact('studentshift'));
    }

    public function StudentShiftUpdate(Request $request,$id){
        $data=StudentShift::find($id);
        $data->shift=$request->shift;
        $data->save();

        $notification = array(
            'message' => 'Successfully Student Shift Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('shift.view')->with($notification);

    }

    public function StudentShiftDelete($id){
        $data=StudentShift::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully Student Shift Deleted',
            'alert-type' => 'success'
        );

        return redirect()->route('shift.view')->with($notification);
    }
}
