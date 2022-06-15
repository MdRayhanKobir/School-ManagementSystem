<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class SchoolSubjectController extends Controller
{
    public function SchoolSubjectView(){
        $schoolsubject=SchoolSubject::all();
        return view('backend.setup.school_subject.school_subject_view',compact('schoolsubject'));
    }
    public function SchoolSubjectAdd(){
        return view('backend.setup.school_subject.school_subject_add');
    }

    public function SchoolSubjectStore(Request $request){
        $validated = $request->validate([
            'school_subject' => 'required|unique:school_subjects,school_subject',
        ]);
        $data=new SchoolSubject();
        $data->school_subject=$request->school_subject;
        $data->save();

        $notification = array(
            'message' => 'Successfully School Subject insert',
            'alert-type' => 'success'
        );

        return redirect()->route('s_subject.view')->with($notification);


    }

    public function SchoolSubjectEdit($id){
        $schoolsubject=SchoolSubject::find($id);
        return view('backend.setup.school_subject.school_subject_edit',compact('schoolsubject'));
    }

    public function SchoolSubjectUpdate(Request $request,$id){
        $data=SchoolSubject::find($id);
        $data->school_subject=$request->school_subject;
        $data->save();
        $notification = array(
            'message' => 'Successfully School Subject Updated',
            'alert-type' => 'success'
        );

        return redirect()->route('s_subject.view')->with($notification);
    }

    public function SchoolSubjectDelete($id){
        $data=SchoolSubject::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully School Subject Delete',
            'alert-type' => 'error'
        );

        return redirect()->route('s_subject.view')->with($notification);
    }

}
