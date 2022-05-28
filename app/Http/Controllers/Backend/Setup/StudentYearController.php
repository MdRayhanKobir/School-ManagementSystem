<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    // student Year
    public function StudentYearView()
    {
        $yeardata = StudentYear::all();
        return view('backend.setup.student_year.student_year_view', compact('yeardata'));
    }

    public function StudentYearAdd()
    {
        return view('backend.setup.student_year.student_year_add');
    }

    public function StudentYearStore(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|unique:student_years,year',
        ]);
        $yeardata = new StudentYear();
        $yeardata->year = $request->year;
        $yeardata->save();

        $notification = array(
            'message' => 'Successfully Student Year Insert',
            'alert-type' => 'success'
        );

        return redirect()->route('studentyear.view')->with($notification);
    }

    public function StudentYearEdit($id)
    {
        $yeardata = StudentYear::find($id);
        return view('backend.setup.student_year.student_year_edit', compact('yeardata'));
    }

    public function StudentYearUpdate(Request $request, $id)
    {
        $yeardata = StudentYear::find($id);
        $yeardata->year = $request->year;
        $yeardata->save();

        $notification = array(
            'message' => 'Successfully Student Year Update',
            'alert-type' => 'success'
        );

        return redirect()->route('studentyear.view')->with($notification);
    }

    public function StudentYearDelete($id)
    {
        $yeardata = StudentYear::find($id);
        $yeardata->delete();

        $notification = array(
            'message' => 'Successfully Student Year Deleted',
            'alert-type' => 'error'
        );

        return redirect()->route('studentyear.view')->with($notification);
    }
}
