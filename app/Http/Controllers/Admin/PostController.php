<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Http\Requests\Admin\UpdateRequest;
use App\Models\Image;
use App\Models\Post;
use App\Service\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected PostService $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(Request $request)
    {
        // Define the number of posts per page (10 by default)
        $perPage = $request->input('perPage', 10);

        // Get posts with pagination and loading of linked images
        $posts = Post::with('images')->orderBy('created_at', 'desc')->paginate($perPage);

        return view('admin.index', compact('posts', 'perPage'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.create', compact('categories'));
    }

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        // Validate the incoming request data based on the UpdateRequest rules
        $validatedData = $request->validated();

        $this->postService->updatePost($request, $post, $validatedData);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

}
