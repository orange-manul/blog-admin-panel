@extends('layouts.default-post')

@section('title', 'All Posts')

@section('content')
    <div class="row">
        <div>
            <form method="GET" action="{{ route('posts.index') }}" class="form-inline mb-3">
                <label for="perPage" class="mr-2">Show:</label>
                <select name="perPage" id="perPage" class="form-control" onchange="this.form.submit()">
                    @php
                        $perPageOptions = [10, 20, 50, 100];
                        if ($totalPosts > 100) {
                            $perPageOptions[] = 200; // Например, добавляем 200, если постов больше 100
                        }
                    @endphp
                    @foreach ($perPageOptions as $option)
                        <option value="{{ $option }}" {{ $perPage == $option ? 'selected' : '' }}>{{ $option }}</option>
                    @endforeach
                </select>
            </form>
        </div>

        <!-- Вывод постов -->
        @foreach ($posts as $post)
            <div class="post-item mb-4 p-3 border rounded">
                <p>{{ $post->content }}</p>
                @if ($post->images->isNotEmpty())
                    @foreach ($post->images as $image)
                        <img src="{{ asset('storage/' . $image->path) }}" alt="Post Image" class="img-fluid" style="max-width: 300px; height: auto;">
                    @endforeach
                @endif
            </div>
            <hr>
        @endforeach
    </div>
    {{ $posts->links() }}
@endsection
