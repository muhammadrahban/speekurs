<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('profile_setting');
    }

    public function setprofile(Request $request){

        return redirect()->back();
    }

    public function account(){
        return view('account');
    }

    public function setaccount(Request $request){
        dd($request->all());
        return redirect()->back();
    }
}
