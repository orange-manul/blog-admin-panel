@extends('layouts.post')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>All Posts</span>
                @role('admin')
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">Create Post</a>
                @endrole
            </div>
            <div class="card-body">
                <!-- Выбор количества постов на странице -->
                <form method="GET" action="{{ route('admin.posts.index') }}" class="form-inline mb-3 w-10">
                    <label for="perPage" class="mr-2">Show:</label>
                    <select name="perPage" id="perPage" class="form-control" onchange="this.form.submit()">
                        <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                        <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                        <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </form>

                <!-- Вывод постов -->
                @foreach ($posts as $post)
                    <div class="post-item mb-4 p-3 border rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="font-weight-bold">{{ $post->title }}</h3>
                            @roles('admin,moderator')
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endroles
                        </div>
                        <p>{{ $post->content }}</p>
                        @if ($post->images->isNotEmpty())
                            @foreach ($post->images as $image)
                                <img src="{{ asset('storage/' . $image->path) }}" alt="Post Image" class="img-fluid" style="max-width: 300px; height: auto;">
                            @endforeach
                        @endif
                    </div>
                    <hr>
                @endforeach


                <!-- Постраничная навигация -->
                <div class="d-flex justify-content-center">
                    {{ $posts->withQueryString()->fragment('posts')->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (window.location.hash === '#posts') {
                document.getElementById('posts').scrollIntoView();
            }

            // Добавляем класс 'active' к выбранному количеству постов
            const perPageSelect = document.getElementById('perPage');
            const options = perPageSelect.options;
            for (let i = 0; i < options.length; i++) {
                if (options[i].selected) {
                    options[i].classList.add('active');
                }
            }

            // Обработка изменения выбора
            perPageSelect.addEventListener('change', function() {
                for (let i = 0; i < options.length; i++) {
                    options[i].classList.remove('active');
                }
                options[perPageSelect.selectedIndex].classList.add('active');
            });
        });
    </script>

    <style>
        .form-control option.active {
            background-color: #007bff;
            color: white;
        }
    </style>
@endsection
