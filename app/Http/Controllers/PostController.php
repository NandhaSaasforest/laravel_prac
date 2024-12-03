<?php

namespace App\Http\Controllers;
use App\Models\Post;

class PostController extends Controller
{
    public function show($id)
    {
        // Find the post by its ID
        $post = Post::find($id);

        // If the post doesn't exist, return a 404 error page
        if (!$post) {
            abort(404, 'Post not found');
        }

        // Return the view with the post data
        return view('routing', ['post' => $post]);
    }

}
