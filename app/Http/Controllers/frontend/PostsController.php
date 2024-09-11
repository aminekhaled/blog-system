<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostsController extends Controller
{
    
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $recent_posts = Post::limit(3)->get();
        $categories = Category::withCount('posts')->get();

        return view('frontend.posts.show', compact('post', 'categories', 'recent_posts'));
    }
    public function showByCategory(string $category_name)
    {
        $category = Category::with('posts')->where('name', $category_name)->get()->first();
        $postsByCategory = $category->posts;

        return view('frontend.posts.show-by-category', compact('postsByCategory'));
    }

}
