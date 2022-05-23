<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function ProfileView(){
        $data=Auth::user()->id;
        $userdata=User::find($data);
        return view('backend.user.profile.view_profile',compact('userdata'));
    }

    public function ProfileEdit(){
        $data=Auth::user()->id;
        $userdata=User::find($data);
        return view('backend.user.profile.edit_profile',compact('userdata'));
    }
}
