<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Define the number of posts per page (10 by default)
        $perPage = $request->input('perPage', 10);

        // Get posts with pagination and loading of linked images
        $posts = Post::with('images')->orderBy('created_at', 'desc')->paginate($perPage);
        $totalPosts = Post::count();
        return view('posts.index', compact('posts', 'perPage', 'totalPosts'));
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
}
