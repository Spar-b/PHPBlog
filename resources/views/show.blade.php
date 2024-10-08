<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1>{{ $send[1]->title }}</h1>
    <p>{{ $send[1]->content }}</p>

    <h3>Comments:</h3>

    @if(!($send[1]->comments))
        <p>No comments yet.</p>
    @else
        <ul>
            @foreach($send[1]->comments as $comment)
                <li>{{ $comment->body }} - by {{ $comment->user->name }} at {{ $comment->created_at }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('comments.store')}}" method="POST">
        @csrf

        <input type="hidden" name="post_id" id="post_id" value="{{ $send[0] }}">

        <label for="body">Content:</label>
        <textarea name="body" id="body" rows="6" required>{{ old('body') }}</textarea>

        <button type="submit">Comment</button>
    </form>
</body>
</html>