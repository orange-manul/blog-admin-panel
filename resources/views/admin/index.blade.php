@extends('layouts.post')

@section('content')
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Posts Table</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <h6 class="mb-0 text-sm">{{ $post->title }}</h6>
                            </td>
                            <td>
                                <p class="text-xs">{{ $post->content }}</p>
                            </td>
                            <td class="align-middle text-center">
                                @if($post->images->isNotEmpty())
                                    <img src="{{ asset('storage/app/public/' . $post->images->first()->path) }}" alt="Post Image" style="width: 100px; height: auto;">
                                @else
                                    <p>No Image</p>
                                @endif
                            </td>
                            <td class="align-middle">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit post">
                                    Edit
                                </a>
                            </td>
                        </tr>
                        <tr><td colspan="5"><hr></td></tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
