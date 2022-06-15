<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class FeeAmountController extends Controller
{
    public function feeAmountView(){
        $feeamount=FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
        return view('backend.setup.fee_amount.fee_amount_view',compact('feeamount'));
    }

    public function feeAmountAdd(){
        $data['fee_categories'] = FeeCategory::all();
    	$data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.fee_amount_add',$data);
    }

    public function feeAmountStore(Request $request){

        $countClass=count($request->class_id);
        if($countClass!=NULL){
            for($i=0;$i<$countClass;$i++){
                $data= new FeeAmount();
            $data->fee_category_id=$request->fee_category_id;
            $data->class_id=$request->class_id[$i];
            $data->amount=$request->amount[$i];
            $data->save();

            $notification = array(
                'message' => 'Successfully FeeAmount Insert',
                'alert-type' => 'success'
            );
            return redirect()->route('feeamount.view')->with($notification);
            }

        }

    }


    public function feeAmountEdit($fee_category_id){
        $feeamount=FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
        $studentclass=StudentClass::all();
        $feecategory=FeeCategory::all();
        return view('backend.setup.fee_amount.fee_amount_edit',compact('feeamount','studentclass','feecategory'));

    }

    public function feeAmountUpdate(Request $request ,$fee_category_id){
        if($request->class_id==NULL){
            $notification = array(
                'message' => 'Sorry you do not select any item',
                'alert-type' => 'warning'
            );
            return redirect()->route('feeamount.edit',$fee_category_id)->with($notification);

        }
        else{
            $countClass=count($request->class_id);
            FeeAmount::where('fee_category_id',$fee_category_id)->delete();
                for($i=0;$i<$countClass;$i++){
                    $data= new FeeAmount();
                    $data->fee_category_id=$request->fee_category_id;
                    $data->class_id=$request->class_id[$i];
                    $data->amount=$request->amount[$i];
                    $data->save();
                }

            }
            $notification = array(
                'message' => 'Successfully FeeAmount Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('feeamount.view',$fee_category_id)->with($notification);

        }

        public function feeAmountDelete($fee_category_id){
            $data=FeeAmount::where('fee_category_id',$fee_category_id);
            $data->delete();
            $notification = array(
                'message' => 'Successfully FeeAmount Deleted',
                'alert-type' => 'error'
            );
            return redirect()->route('feeamount.view',$fee_category_id)->with($notification);
        }

        public function feeAmountDetails($fee_category_id){
            $feeamountdetails=FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
            return view('backend.setup.fee_amount.fee_amount_details',compact('feeamountdetails'));
        }

}

