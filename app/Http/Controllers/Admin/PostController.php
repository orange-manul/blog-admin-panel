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

    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, Post $post, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Максимальный размер 2MB
        ]);

        // Обработка загрузки нового изображения
        if ($request->hasFile('image')) {
            // Проверяем, есть ли изображение у поста
            if ($post->images->isNotEmpty()) {
                // Удаляем старое изображение из хранилища
                Storage::disk('public')->delete($post->images->first()->path);

                // Удаляем запись об изображении из базы данных
                $post->images()->delete();
            }

            // Загрузка нового изображения в хранилище
            $path = $request->file('image')->store('images', 'public');

            // Создаем новую запись об изображении в базе данных
            $post->images()->create([
                'path' => $path,
            ]);
        }

        // Обновление остальных данных поста
        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

}
