<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    public function StudentGroup(){
        $studentgroup=StudentGroup::all();
        return view('backend.setup.student_group.student_group_view',compact('studentgroup'));
    }
     public function StudentGroupAdd(){
         return view('backend.setup.student_group.student_group_add');
     }

     public function StudentGroupStore(Request $request){
        $validated = $request->validate([
            'student_group' => 'required|unique:student_groups,student_group',
        ]);

        $data= new StudentGroup();
        $data->student_group=$request->student_group;
        $data->save();

        $notification = array(
            'message' => 'Successfully Group insert',
            'alert-type' => 'success'
        );

        return redirect()->route('studentgroup.view')->with($notification);

     }

     public function StudentGroupEdit($id){
         $studentgroup=StudentGroup::find($id);
         return view('backend.setup.student_group.student_group_edit',compact('studentgroup'));
     }

     public function StudentGroupUpdate(Request $request, $id){
         $data=StudentGroup::find($id);
         $data->student_group=$request->student_group;
         $data->save();

         $notification = array(
            'message' => 'Successfully Group Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('studentgroup.view')->with($notification);
     }

     public function StudentGroupDelete($id){
         $data=StudentGroup::find($id);
         $data->delete();
         $notification = array(
            'message' => 'Successfully Group Delete',
            'alert-type' => 'error'
        );

        return redirect()->route('studentgroup.view')->with($notification);
     }
}
