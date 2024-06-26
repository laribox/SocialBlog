<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request('search')){
            return view('posts.index',['posts' => auth()->user()->posts()->search(request('search'))->latest()->paginate(5)]) ;
        }
        return view('posts.index',['posts' => auth()->user()->posts()->latest()->paginate(5)]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    public function list(){
        return view('posts.list')->with('posts', Post::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->image->move(public_path('images'), "{$request->image->getClientOriginalName()}");
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = asset('images')."/". $request->image->getClientOriginalName();
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post)->with('comments', $post->comments->sortbyDesc('created_at'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
