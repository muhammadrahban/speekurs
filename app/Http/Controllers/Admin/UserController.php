<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        if($request->post('status') == NULL){
           $status = 0;
        }else{
            $status = 1;
        }
        $request->validate([
            'name'      => 'required',
            'email'     => 'required'
        ]);
        $user           = User::find($id);
        $user->name     = $request->post('name');
        $user->email    = $request->post('email');
        $user->status   = $status;
        $user->save();
        return redirect('/admin/users')->with('success', 'User Updated!');
    }

    public function getactivity($id){
        $users = User::find($id);
        $postLike = Post::withCount(['like' => function($query) use ($id){
            $query->orWhere('likes.user_id', $id);
        }])->get();
        dd($postLike);
        return view('admin.user.activity');
    }
}
