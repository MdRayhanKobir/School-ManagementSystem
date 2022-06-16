<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRegController extends Controller
{
    public function StudentRegView(){

        $assignStudent=AssignStudent::all();
        return view('backend.student.student_reg.student_reg_view',compact('assignStudent'));

    }

    public function StudentRegAdd(){

        $yeardata=StudentYear::all();
        $classdata=StudentClass::all();
        $groupdata=StudentGroup::all();
        $shiftdata=StudentShift::all();
         return view('backend.student.student_reg.student_reg_add',compact('yeardata','classdata','groupdata','shiftdata'));
    }


    public function StudentRegStore(Request $request){


    }


}
