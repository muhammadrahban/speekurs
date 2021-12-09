<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
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
        $pages = Page::get();
        // dd($pages);
        return view('admin.page.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Page = 0;
        return view('admin.page.create', compact('Page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body'  => 'required',
        ]);
        $slug = str_replace(" ","-",$request->post('title'));
        $page = new Page([
            'title'     => $request->post('title'),
            'slug'     => $slug,
            'body'      => $request->post('body'),
            'status'    => 1
        ]);
        $page->save();
        return redirect('/admin/page')->with('success', 'Page saved!');
    }

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
        $Page = Page::find($id);
        return view('admin.page.create', compact('Page'));
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
        $request->validate([
            'title' => 'required',
            'body'  => 'required'
        ]);
        $slug = str_replace(" ","-",$request->post('title'));
        $post           = Page::find($id);
        $post->title    = $request->post('title');
        $post->slug     = $slug;
        $post->body     = $request->post('body');
        $post->status   = 1;
        $post->save();
        return redirect('/admin/page')->with('success', 'Page saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('/admin/page')->with('success', 'Page deleted!');
    }
}
