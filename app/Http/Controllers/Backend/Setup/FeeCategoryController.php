<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class FeeCategoryController extends Controller
{
    public function FeeCategory(){
        $feecategory=FeeCategory::all();
        return view('backend.setup.fee_category.fee_category_view',compact('feecategory'));
    }

    public function FeeCategoryAdd(){
        return view('backend.setup.fee_category.feecategory_add');
    }

    public function FeeCategoryStore(Request  $request){
        $validated = $request->validate([
            'feecategory' => 'required|unique:fee_categories,feecategory',
        ]);
        $data= new FeeCategory();
        $data->feecategory=$request->feecategory;
        $data->save();

        $notification = array(
            'message' => 'Successfully FeeCategory insert',
            'alert-type' => 'success'
        );

        return redirect()->route('fee_category.view')->with($notification);

    }

    public function FeeCategoryEdit($id){
        $feecategory=FeeCategory::find($id);
        return view('backend.setup.fee_category.feecategory_edit',compact('feecategory'));
    }

    public function FeeCategoryUpdate(Request $request,$id){
        $data=FeeCategory::find($id);
        $data->feecategory=$request->feecategory;
        $data->save();

        $notification = array(
            'message' => 'Successfully FeeCategory  Update',
            'alert-type' => 'success'
        );
        return redirect()->route('fee_category.view')->with($notification);

    }

    public function FeeCategoryDelete($id){
        $data=FeeCategory::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Successfully FeeCategory  Deleted',
            'alert-type' => 'error'
        );
        return redirect()->route('fee_category.view')->with($notification);
    }


}
