<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Storage;
// use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Isposts = 0;
        $categories = Category::get();
        return view('admin.post.create', compact('Isposts', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = $request->validate([
            'title'         => 'required|max:180',
            'category_id'   => 'required',
            'sub_title'     => 'required|max:180',
            'description'   => 'required|max:600',
        ]);
        // dd($input);
        if ($input['imageUpload'] || $input['imageUpload'] != NULL) {
            // dd($input);
            $folderPath = public_path('postimage/');
            $image_parts = explode(";base64,", $input['imageUpload']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            // // $file = $folderPath . uniqid() . '.png';
            $filename = time() . '.'. $image_type;
            $file =$folderPath.$filename;
            file_put_contents($file, $image_base64);

            // Storage::disk('postimg')->putFile('',$imageName);
            $input['image'] = 'postimage/' .$filename;

        }else if($input['videoUpload']){
            $input['image'] = $input['videoUpload'];
        }
        if ($request->post('date') == null) {
            $input['date'] = Carbon\Carbon::now();
        }
        if ($request->post('featured') == "on") {
            $input['featured'] = 1;
        }else{
            $input['featured'] = 0;
        }
        $post = Post::create($input);
        return redirect()->route('post.index');
    }

    // \File::put(storage_path(). '/' . $imageName, base64_decode($image));

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('commentUser')->withCount('like')->where('id' ,$id)->get();
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'Isposts'       => 1,
            'categories'    => Category::get(),
            'post'         => Post::find($id),
        ];
        // dd($data['post']);
        return view('admin.post.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = $request->validate([
            'title'         => 'required|max:180',
            'category_id'   => 'required',
            'sub_title'     => 'required|max:180',
            'description'   => 'required|max:600',
        ]);
        $post = Post::find($id);
       if ($input['imageUpload'] || $input['imageUpload'] != NULL) {
            $folderPath = public_path('postimage/');
            $image_parts = explode(";base64,", $input['imageUpload']);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename = time() . '.'. $image_type;
            $file =$folderPath.$filename;
            file_put_contents($file, $image_base64);
            $post->image = 'postimage/' .$filename;

        }else if($input['videoUpload']){
            $post->image = $input['videoUpload'];
        }
        if ($request->post('date') == null) {
            $post->date = Carbon::createFromFormat('Y-m-d H:i:s', $request->date);
        }
        if ($request->post('featured') == "on") {
            $post->featured = 1;
        }else{
            $post->featured = 0;
        }
        $post->title            =   $request->title;
        $post->category_id      =   $request->category_id;
        $post->sub_title        =   $request->sub_title;
        $post->description      =   $request->description;
        $post->save();
        // $post = Post::update($input);
        return redirect()->route('post.index')->with('success', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted!');
    }
}
