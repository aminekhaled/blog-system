<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\File;


class PostsController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $posts = Post::with('user')->with('category')->limit(10)->get();

        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            File::put(public_path('backend/assets/images/posts') . '/' . $imageName, File::get($image));
        }

        $post = new Post;

        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $imageName;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->category;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post Published Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('backend.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $NewimageName = time().'.'.$image->getClientOriginalExtension();
            File::put(public_path('backend/assets/images/posts') . '/' . $NewimageName, File::get($image));
        }

        $post = Post::find($id);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->image = $request->hasFile('image') ? $NewimageName : $post->image;
        $post->category_id = $request->category;

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post Deleted Successfully');

    }
}
