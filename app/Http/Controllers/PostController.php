<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function show($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Return the view with the post data
        return view('routing', ['post' => $post]);
    }

    public function about()
    {
        return view('about');
    }
}
