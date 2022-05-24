<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileView()
    {
        $data = Auth::user()->id;
        $userdata = User::find($data);
        return view('backend.user.profile.view_profile', compact('userdata'));
    }

    public function ProfileEdit()
    {
        $data = Auth::user()->id;
        $userdata = User::find($data);
        return view('backend.user.profile.edit_profile', compact('userdata'));
    }

    public function ProfileUpdate(Request $request)
    {

        $data = Auth::user()->id;
        $userdata = User::find($data);
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->mobile = $request->mobile;
        $userdata->address = $request->address;
        $userdata->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $userdata->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $fileName);
            $userdata['image'] = $fileName;
        }
        $userdata->save();

        $notification = array(
            'message' => 'Update Successfuly User Profile',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);
    }

    public function ProfilePassword()
    {
        return view('backend.user.password.change_password');
    }

    public function ProfilePasswordUpdate(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Successfuly User Password Updated',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($notification);
        } else {
            $notification = array(
                'message' => 'Please insert currect your Information ',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
}
