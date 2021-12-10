<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Like;
use App\Post;
use App\Comment;
use App\Bookmark;
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
        $users                  = User::find($id);
        $Bookmark               = Bookmark::get();
        $data['post_like']      = Like::where('user_id', $id)->leftJoin('posts', 'posts.id','=','likes.post_id')->select('likes.id as like_id', 'posts.*')->orderby('likes.created_at','desc')->get();
        $data['post_comment']   = Comment::where('user_id', $id)->leftJoin('posts', 'posts.id','=','comments.post_id')->select('comments.id as comment_id','comments.comment as comment','comments.parent_comment_id as `parent`', 'posts.*')->orderby('comments.created_at','desc')->get();
        $data['post_bookmark']  = Bookmark::where('user_id', $id)->leftJoin('posts', 'posts.id','=','bookmarks.post_id')->select('bookmarks.id as book_id', 'posts.*')->orderby('bookmarks.created_at','desc')->get();
        //dd($data['post_comment']);
        
        return view('admin.user.activity', $data);
    }

    public function setting(){
        return view('admin.user.setting');
    }
}
