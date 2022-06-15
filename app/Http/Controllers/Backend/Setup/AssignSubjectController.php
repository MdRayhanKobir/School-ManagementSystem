<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function AssignSubjectView(){
        $assignsubject=AssignSubject::select('class_id')->groupBy('class_id')->get();

        return view('backend.setup.assign_subject.assign_subject_view',compact('assignsubject'));

    }

    public function AssignSubjectAdd(){
        $studentsubject=SchoolSubject::all();
        $studentclass=StudentClass::all();
        return view('backend.setup.assign_subject.assign_subject_add',compact('studentsubject','studentclass'));
    }

    public function AssignSubjectStore(Request $request){

        $countsubject=count($request->subject_id);
        if($countsubject!=NULL){
            for($i=0;$i<$countsubject;$i++){
                $data= new AssignSubject();
            $data->class_id=$request->class_id;
            $data->subject_id=$request->subject_id[$i];
            $data->full_mark=$request->full_mark[$i];
            $data->pass_mark=$request->pass_mark[$i];
            $data->subjective_mark=$request->subjective_mark[$i];
            $data->save();

            $notification = array(
                'message' => 'Successfully Assign Subject Insert',
                'alert-type' => 'success'
            );
            return redirect()->route('assign_subject.view')->with($notification);
            }

        }
    }


    public function AssignSubjectEdit($class_id){
        $assignsubject=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        $schoolsubject=SchoolSubject::all();
        $studentclass=StudentClass::all();
        return view('backend.setup.assign_subject.assign_subject_edit',compact('assignsubject','schoolsubject','studentclass'));
    }

    public function AssignSubjectUpdate(Request $request,$class_id){
        if($request->subject_id==NULL){
            $notification = array(
                'message' => 'Sorry you do not select any item',
                'alert-type' => 'warning'
            );
            return redirect()->route('assign_subject.view',$class_id)->with($notification);

        }
        else{
            $countsubject=count($request->subject_id);
            AssignSubject::where('class_id',$class_id)->delete();
                for($i=0;$i<$countsubject;$i++){
                    $data= new AssignSubject();
                    $data->class_id=$request->class_id;
                    $data->subject_id=$request->subject_id[$i];
                    $data->full_mark=$request->full_mark[$i];
                    $data->pass_mark=$request->pass_mark[$i];
                    $data->subjective_mark=$request->subjective_mark[$i];
                    $data->save();

                }

            }
            $notification = array(
                'message' => 'Successfully AssignSubject Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('assign_subject.view',$class_id)->with($notification);

    }

    public function AssignSubjectDelete($class_id){
        $data=AssignSubject::where('class_id',$class_id);
        $data->delete();
        $notification = array(
            'message' => 'Successfully AssignSubject Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('assign_subject.view',$class_id)->with($notification);
    }

    public function AssignSubjectDetails($class_id){
        $assignsubject=AssignSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
        return view('backend.setup.assign_subject.assign_subject_details',compact('assignsubject'));
    }




}
