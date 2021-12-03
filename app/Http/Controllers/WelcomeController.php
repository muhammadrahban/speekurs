<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Page;
use App\Like;
use App\Comment;
use App\Bookmark;
use App\Category;
use Auth;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index(){
        return view('new_welcome');
    }

    public function getPost($category_id = 0, $id = 1){
        if (!Auth::check()) {
            if ($id == 1) {
                $posts = Post::where('category_id', $category_id)->withCount('like as like')->withCount('comment as comments')->orderBy('date', 'DESC')->get();
            }else if ($id == 2) {
                $posts = Post::where('category_id', $category_id)->withCount('like as like')->withCount('comment as comments')->whereBetween('created_at', [Carbon::now()->subdays(7), Carbon::now()])->orderBy('like', 'DESC')->get();
            }else if ($id == 3) {
                $posts = Post::where('category_id', $category_id)->withCount('like as like')->withCount('comment as comments')->orderBy('like', 'DESC')->get();
            }else if ($id == 4) {
                $posts = Post::where('category_id', $category_id)->withCount('like as like')->withCount('comment as comments')->whereBetween('created_at', [Carbon::now()->subdays(7), Carbon::now()])->orderBy('comments', 'DESC')->get();
            }else if ($id == 5) {
                $posts = Post::where('category_id', $category_id)->withCount('like as like')->withCount('comment as comments')->orderBy('comments', 'DESC')->get();
            }else{
                $posts = Post::where('category_id', $category_id)->withCount('like as like')->orderBy('date', 'DESC')->get();
            }
        }else{
            // $posts = Post::where('category_id', $category_id)->with('like', 'isliked', 'bookmark')->orderBy('date', 'asc')->get();
            if ($id == 1) {
                $posts = Post::where('category_id', $category_id)->with('isliked')->withCount('bookmark as bookmark')->withCount('like as like')->withCount('comment as comments')->orderBy('date', 'DESC')->get();
            }else if ($id == 2) {
                $posts = Post::where('category_id', $category_id)->with('isliked')->withCount('bookmark as bookmark')->withCount('like')->withCount('comment as comments')->whereBetween('created_at', [Carbon::now()->subdays(7), Carbon::now()])->orderBy('like', 'DESC')->get();
            }else if ($id == 3) {
                $posts = Post::where('category_id', $category_id)->with('isliked')->withCount('bookmark as bookmark')->withCount('like as like')->withCount('comment as comments')->orderBy('like', 'DESC')->get();
            }else if ($id == 4) {
                $posts = Post::where('category_id', $category_id)->with('isliked')->withCount('bookmark as bookmark')->withCount('like as like')->withCount('comment as comments')->whereBetween('created_at', [Carbon::now()->subdays(7), Carbon::now()])->orderBy('comments', 'DESC')->get();
            }else if ($id == 5) {
                $posts = Post::where('category_id', $category_id)->with('isliked')->withCount('bookmark as bookmark')->withCount('like as like')->withCount('comment as comments')->orderBy('comments', 'DESC')->get();
            }else{
                $posts = Post::where('category_id', $category_id)->with('isliked')->withCount('bookmark as bookmark')->withCount('like as like')->orderBy('date', 'DESC')->get();
            }
        }

        $Posts['data'] = $posts;
        return json_encode($Posts);
    }

    public function getbookmark(){
        if (!Auth::check()) {
        }else{
            $user_id = Auth::user()->id;
            $bookmark   = Post::join('bookmarks', 'bookmarks.post_id', '=', 'posts.id')->where('bookmarks.user_id', $user_id)->get();
        }
        $data['bookmark'] = $bookmark;
        return view('bookmark', $data);
    }

    public function removebookmark(Request $request){
        if (!Auth::check()) {
        }else{
            $user_id    = Auth::user()->id;
            $post_id    = $request->post('post_id');
            $bookmark   = Bookmark::where('user_id', $user_id)->where('post_id', $post_id)->get();
            $bookmark->delete();
        }
        return $this->getbookmark();
    }

    public function setLike(Request $request){
        $user_id = Auth::user()->id;
        // echo $user_id;exit;
        $posts = Like::where(
            ['post_id' => $request->post('postid'), 'user_id' => $user_id])->first();

        if ($posts) {
            $Like = Like::where(['post_id' => $request->post('postid'),'user_id' => $user_id ])->first();
            $Like->delete();

            $count = Like::where(['post_id' => $request->post('postid') ])->get()->count();
            return response()->json(['response','dislike:'. $count]);
        }else{
            Like::create([
                'user_id'   => $user_id,
                'post_id'   => $request->post('postid')
            ]);
            $count = Like::where(['post_id' => $request->post('postid') ])->get()->count();
            return response()->json(['response','liked:'. $count]);
        }
        return response()->json(['response','error']);
    }

    public function sebookmark(Request $request){
        $user_id = Auth::user()->id;
        $posts = Bookmark::where(['post_id' => $request->post('postid'), 'user_id' => $user_id])->first();

        if ($posts) {
            $Like = Bookmark::where(['post_id' => $request->post('postid'),'user_id' => $user_id ])->first();
            $Like->delete();

            $count = Bookmark::where(['post_id' => $request->post('postid') ])->get()->count();
            return response()->json(['response','dislike:'. $count]);
        }else{
            Bookmark::create([
                'user_id'   => $user_id,
                'post_id'   => $request->post('postid')
            ]);
            $count = Bookmark::where(['post_id' => $request->post('postid') ])->get()->count();
            return response()->json(['response','liked:'. $count]);
        }
        return response()->json(['response','error']);
    }

    public function getPage($page_slug){
        $data = Page::where('slug', $page_slug)->get();
        $Posts['data'] = $data;
        return view('page', $Posts);
    }

    public function singlepost($id = 0){
        if (!Auth::check()) {
            $data = Post::where('id', $id)->with('like')->get();
        }else{
            $data = Post::where('id', $id)->with('like', 'isliked', 'bookmark')->get();
        }
        $Posts['data'] = $data;
        return view('singlepost', $Posts);
    }

    public function setComment(Request $request){
        $parent_comment = Comment::where('id' , $request->post('p_comment'))->get();

        if($parent_comment->count()>0){
            $mark=$parent_comment[0]->mark;
        }else{
            $mark=strtotime(Carbon::now());
        }
        $user_id = Auth::user()->id;
        Comment::create([
            'user_id'           => $user_id,
            'post_id'           => $request->post('postid'),
            'comment'           => $request->post('comment'),
            'parent_comment_id' => $request->post('p_comment'),
            'mark'              => $mark
        ]);
        return 'success';
    }

    public function getComments(Request $request){
        $comments  = Comment::where('post_id', $request->post('postid'))->with('users')->orderBy('mark')->get();
        return response()->json($comments);
    }

    public function setCommentLike(Request $request){
        $user_id    = Auth::user()->id;
        if ($request->post('p_comment')) {
            # code...
        }else{
            $posts      = Like::where(['comment_id' => $request->post('comment_id'), 'user_id' => $user_id])->first();
            if($posts){
                $Like   = Like::where(['comment_id' => $request->post('comment_id'),'user_id' => $user_id ])->first();
                $Like->delete();
                $count  = Like::where(['comment_id' => $request->post('comment_id') ])->get()->count();
                return response()->json(['response','dislike:'. $count]);
            }else{
                Like::create([
                    'user_id'       => $user_id,
                    'comment_id'    => $request->post('comment_id')
                ]);
                $count = Like::where(['comment_id' => $request->post('comment_id') ])->get()->count();
                return response()->json(['response','liked:'. $count]);
            }
            return response()->json(['response','error']);
        }
    }

    public function search($char = ""){

        $posts = Post::where('title', 'LIKE', "%$char%")->orWhere('sub_title', 'LIKE', "%$char%")->take(5)->get();
        return response()->json(['response',$posts]);

    }
}
