<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('images')->get();
        return view('admin.index', compact('posts'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        // Create the post
        $post = Post::create($validatedData);

        // Handle the image upload
        if ($request->hasFile('image')) {
            // Store the image
            $path = $request->file('image')->store('images', 'public');

            // Save the image path to the images table
            Image::create([
                'path' => $path,
                'post_id' => $post->id,
            ]);
        }

        // Redirect to the posts index
        return redirect()->route('admin.posts.index');
    }
}
