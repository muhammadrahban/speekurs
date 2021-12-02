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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
