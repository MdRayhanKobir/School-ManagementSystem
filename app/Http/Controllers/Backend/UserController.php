<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use BaconQrCode\Renderer\Color\Rgb;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView(){
        $userData=User::all();
        return view('backend.user.view_user',compact('userData'));
    }

    public function AddUser(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){

        $validateData=$request->validate([
            'name'=>'required',
            'password'=>'required',
            'email'=>'required|unique:users'
        ]);
        $data=new User();
        $data->name=$request->name;
        $data->email=$request->email;
        $data->user_type=$request->user_type;
        $data->password=bcrypt($request->password);
        $data->save();
        $notification=array(
            'message'=>'Insert Successfuly User',
            'alert-type'=>'success'
        );

        return redirect()->route('user.view')->with($notification);

    }
}
