@extends('layouts.app')

@section('title', 'Create a New Post')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mb-4">Create a New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content:</label>
                <textarea name="content" class="form-control" id="content" rows="6" required>{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>

        <p class="mt-4"><a href="{{ route('posts.index') }}" class="btn btn-link">Back to all posts</a></p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection
