@extends('layouts.post')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Post
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                    @if ($post->images->isNotEmpty())
                        <div class="mt-3">
                            <label>Current Image</label><br>
                            <img src="{{ asset('storage/' . $post->images->first()->path) }}" alt="Current Image" style="max-width: 300px; height: auto;"><br>
                            <label for="delete_image">
                                <input type="checkbox" name="delete_image" id="delete_image">
                                Delete Current Image
                            </label>
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
