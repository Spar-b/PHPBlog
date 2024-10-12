<!-- resources/views/posts/index.blade.php -->
@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mb-4">List of Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create a New Post</a>

        @if($posts->isEmpty())
            <div class="alert alert-info">No posts available.</div>
        @else
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                        
                        <div>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
