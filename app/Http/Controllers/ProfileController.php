<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        $user_id    = \Auth::user()->id;
        $user       = User::find($user_id);
        return view('profile_setting', compact('user'));
    }

    public function setprofile(Request $request){

        $user_id    = \Auth::user()->id;
        $user       = User::find($user_id);
        if (Hash::check($request->post('current_password'), $user->password)) {
            $user->name     =  $request->post('name');
            $user->dob      =  $request->post('dob');
            $user->country   =  $request->post('county');
            $user->save();
            return redirect('/')->with('success', 'profile saved!');
        }else{
            return redirect('/')->with('error', 'Password Not Match!');
        }

    }

    public function account(){
        return view('account');
    }

    public function setaccount(Request $request){
        $user_id    = \Auth::user()->id;
        $user       = User::find($user_id);
        $this->validate($request, [
            'current_password'      => 'required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);
        if (Hash::check($request->post('current_password'), $user->password)) {
            User::where('id', $user_id)->update([
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect('/account')->with('success', 'profile saved!');
        }else{
            return redirect('/account')->with('error', 'Password Not Match!');
        }
    }
}
