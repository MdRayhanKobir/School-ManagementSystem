<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use BaconQrCode\Renderer\Color\Rgb;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class UserController extends Controller
{
    public function UserView(){
        $userData=User::where('user_type','Admin')->get();
        return view('backend.user.view_user',compact('userData'));
    }

    public function AddUser(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){

        $validateData=$request->validate([
            'name'=>'required',
            'email'=>'required|unique:users'
        ]);
        $data=new User();
        $code=rand(0000,9999);
        $data->user_type='Admin';
        $data->role=$request->role;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($code);
        $data->code=$code;
        $data->save();

        $notification=array(
            'message'=>'Insert Successfuly User',
            'alert-type'=>'success'
        );

        return redirect()->route('user.view')->with($notification);

    }

    public function EditUser($id){
        $editUser=User::find($id);
        return view('backend.user.edit_user',compact('editUser'));
    }

    public function UpdateUser(Request $request,$id){
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->role=$request->role;
        $data->save();
        $notification=array(
            'message'=>'Update Successfuly User',
            'alert-type'=>'success'
        );
        return redirect()->route('user.view')->with($notification);
    }

    public function DeleteUser($id){
        $data=User::find($id);
        $data->delete();
        $notification=array(
            'message'=>'Delete Successfuly User',
            'alert-type'=>'error'
        );
        return redirect()->route('user.view')->with($notification);
    }
}
