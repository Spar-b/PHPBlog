@extends('layouts.app')

@section('title', $send[1]->title)

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mb-4">{{ $send[1]->title }}</h1>
        <p>{{ $send[1]->content }}</p>

        <h3 class="mt-5">Comments:</h3>

        @if($send[1]->comments->isEmpty())
            <div class="alert alert-info">No comments yet.</div>
        @else
            <ul class="list-group mb-4">
                @foreach($send[1]->comments as $comment)
                    <li class="list-group-item">
                        <strong>{{ $comment->user->name }}</strong> <span class="text-muted">on {{ $comment->created_at->format('M d, Y H:i') }}</span>
                        <p>{{ $comment->body }}</p>
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('comments.store')}}" method="POST" class="mb-5">
            @csrf
            <input type="hidden" name="post_id" value="{{ $send[0] }}">

            <div class="mb-3">
                <label for="body" class="form-label">Leave a Comment:</label>
                <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Post Comment</button>
        </form>
    </div>
</div>
@endsection
