<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\PostsResource;
use App\Models\posts;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = posts::all();
        return view('posts.index', compact('posts'));
    }

    public function allpost1()
    {
        $posts = posts::where('status',"publish")->get();
        return view('posts.allpost', compact('posts'));
    }

    public function draft()
    {
        $posts = posts::where('status',"draft")->get();
        return view('posts.allpost', compact('posts'));
    }

    public function thrash()
    {
        $posts = posts::where('status',"thrash")->get();
        return view('posts.allpost', compact('posts'));
    }
    public function preview()
    {
        $posts = posts::paginate(2);
        return view('posts.preview', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title'=>['required','min:2'],
            'content'=>['required','min:2'],
            'category'=>['required','min:3'],
            'created_at'=>['timestamp'],
            'updated_at'=>['timestamp'],
            'status'=>['required','in:publish,draft,thrash']
        ]);

        $posts = new posts([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'category' => $request->get('category'),
            'created_at' => $request->get('created_at'),
            'updated_at' => $request->get('updated_at'),
            'status' => $request->get('status')
        ]);
        $posts->save();
        return redirect('/posts')->with('success', 'Posts saved!');
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
        $posts = posts::find($id);
        return view('posts.edit', compact('posts'));
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
            'title'=>['required','min:2'],
            'content'=>['required','min:2'],
            'category'=>['required','min:3'],
            'updated_at'=>['timestamp'],
            'status'=>['required','in:publish,draft,thrash']
        ]);

        $posts = posts::find($id);
        $posts->title =  $request->get('title');
        $posts->content = $request->get('content');
        $posts->category = $request->get('category');
        $posts->updated_at = $request->get('updated_at');
        $posts->status = $request->get('status');
        $posts->save();

        return redirect('/posts')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = posts::find($id);
        $posts->delete();

        return redirect('/posts')->with('success', 'Post deleted!');
    }
}
