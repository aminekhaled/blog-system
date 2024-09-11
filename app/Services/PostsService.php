<?php

namespace App\Services;
use App\Models\Post;
use App\Services\ImagesOperations;
use Illuminate\Support\Facades\Auth;

class PostsService {

    public function create($data) {

        $image = (new ImagesOperations)->upload(
            path: public_path('backend/assets/images/posts'), 
            image: $data['image']
        );

        $post = new Post;

        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->image = $image;
        $post->user_id = Auth::user()->id;
        $post->category_id = $data['category'];

        $post->save();

    }

    public function update($postId, $data) {

        $post = Post::find($postId);
        
        $image = isset($data['image']) ? (new ImagesOperations)->upload(
            path: public_path('backend/assets/images/posts'),
            image: $data['image']
        ) : $post->image;
        
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->image = $image;
        $post->category_id = $data['category'];

        $post->save();

    }

}