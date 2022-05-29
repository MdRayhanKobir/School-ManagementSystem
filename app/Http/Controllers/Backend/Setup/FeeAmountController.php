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
}
