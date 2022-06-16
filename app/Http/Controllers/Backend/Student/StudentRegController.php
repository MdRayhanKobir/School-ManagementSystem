<?php

namespace App\Http\Controllers\Backend\Student;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\StudentDiscount;
use App\Models\User;

class StudentRegController extends Controller
{
    public function StudentRegView(){
        
        $yeardata       =   StudentYear::all();
        $classdata      =   StudentClass::all();
        $year_id        =   StudentYear::orderBy('id','desc')->first()->id;
        $class_id       =   StudentClass::orderBy('id','desc')->first()->id;
        
        $assignStudent  =   AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
        // dd($assignStudent);
        return view('backend.student.student_reg.student_reg_view',compact('assignStudent','yeardata','classdata','year_id','class_id'));

    }

    public function StudentRegAdd(){

        $yeardata   =   StudentYear::all();
        $classdata  =   StudentClass::all();
        $groupdata  =   StudentGroup::all();
        $shiftdata  =   StudentShift::all();
        $user       =   User::all();
         return view('backend.student.student_reg.student_reg_add',compact('yeardata','classdata','groupdata','shiftdata'));
    }


    public function StudentRegStore(Request $request){


        DB::transaction(function () use($request) {
            // dd($request);

            $checkyear  =   StudentYear::find($request->year_id)->year;
            $student    =   User::where('user_type','Student')->orderBy('id','DESC')->first();

            if($student==NULL){
                $firstreg   =   0;
                $studentId  =   $firstreg+1;

                if($studentId<10){
                    $id_no  =   '000'.$studentId;

                }elseif($studentId<100){
                    $id_no  =   '00'.$studentId;

                }elseif($studentId<1000){
                    $id_no  =   '0'.$studentId;
                }

            }else{
                $student    =   User::where('user_type','Student')->orderBy('id','DESC')->first()->id;
                $studentId  =   $student+1;
                if($studentId<10){
                    $id_no  =   '000'.$studentId;

                }elseif($studentId<100){
                    $id_no  =   '00'.$studentId;

                }elseif($studentId<1000){
                    $id_no  =   '0'.$studentId;
                }

            }
            // END ELSE
            $final_id_number=$checkyear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_number ;
            $user->password = bcrypt($code);
            $user->user_type = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d',strtotime($request->dob));

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $user['image']= $filename;
            }
             $user->save();
            // save 1 table

            $assign_student             =   new AssignStudent();
            $assign_student->student_id =   $user->id;
            $assign_student->class_id   =   $request->class_id;
            $assign_student->year_id    =   $request->year_id;
            $assign_student->group_id   =   $request->group_id;
            $assign_student->shift_id   =   $request->shift_id;
            $assign_student->save();
        //   save 2 table

            $discount_student                       =   new StudentDiscount();
            $discount_student->assign_student_id    =   $assign_student->id;
            $discount_student->fee_category_id      =   '1';
            $discount_student->discount             =   $request->discount;
            $discount_student->save();




        });


        $notification = array(
            'message'       =>  'Student Registration Insert Successfully ',
            'alert-type'    =>  'success'
        );
        return redirect()->route('student.reg.view')->with($notification);


    }
    // end method


}
