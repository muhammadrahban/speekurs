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
            'email'                 => 'required',
            'current_password'      => 'required',
            'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ]);
        $data['email']            =   $request->email;

        if ($user->password) {
            if (Hash::check($request->post('current_password'), $user->password)) {
                $data['password']         =   Hash::make($request->password);
                $user->update($data);
                return redirect('/account')->with('success', 'profile saved!');
            }else{
                return redirect('/account')->with('error', 'Password Not Match!');
            }
        }else{
            $user->update($data);
            return redirect('/account')->with('success', 'profile saved!');
        }
    }

    public function deactive(Request $request){
        $user_id    = \Auth::user()->id;
        $user       = User::find($user_id);
        $this->validate($request, [
            'current_password'      => 'required',
        ]);

        if (Hash::check($request->post('current_password'), $user->password)) {
            $data['status']         =   '0';
            $user->update($data);
            return redirect('/account')->with('success', 'profile saved!');
        }else{
            return redirect('/account')->with('error', 'Password Not Match!');
        }
    }
}
