<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Services\PostsService;
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
        (new PostsService)->create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post Published Successfully');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('backend.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        (new PostsService)->update($id, $request->all());

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
