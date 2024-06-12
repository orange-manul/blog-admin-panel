@extends('layouts.post')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
{{--                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>--}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
