<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
    <h1>List of Posts</h1>
    <a href="{{ route('posts.create') }}">Create a New Post</a>

    @if($posts->isEmpty())
        <p>No posts available.</p>
    @else
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    <a href="{{ route('posts.edit', $post) }}">Edit</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
