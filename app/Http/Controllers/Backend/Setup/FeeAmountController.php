<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function feeAmountView(){
        $feeamount=FeeAmount::all();
        return view('backend.setup.fee_amount.fee_amount_view',compact('feeamount'));
    }

    public function feeAmountAdd(){
        $feecategory=FeeCategory::all();
        $studentclass=StudentClass::all();
        return view('backend.setup.fee_amount.fee_amount_add',compact('feecategory','studentclass'));
    }
}
