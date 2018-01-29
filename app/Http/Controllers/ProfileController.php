<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function editProfile(){
        $user=User::find(Auth::id());
        return view('profile.edit')->withUser($user);
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'title' => 'required|string|max:255',
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'dob' => 'required|string|date|max:255',
            'gender' => 'required|string|max:255',
        ]);

        $user=User::find(Auth::id());
        $user->title=$request->title;
        $user->forename=$request->forename;
        $user->surname=$request->surname;
        $user->dob=$request->dob;
        $user->gender=$request->gender;
        $user->save();

        Session::flash('message','Profile info successfully updated!');
        return redirect()->back();

    }
}
