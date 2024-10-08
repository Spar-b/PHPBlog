<!-- resources/views/posts/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Create a New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>

        <label for="content">Content:</label>
        <textarea name="content" id="content" rows="6" required>{{ old('content') }}</textarea>

        <button type="submit">Create Post</button>
    </form>

    <p><a href="{{ route('posts.index') }}">Back to all posts</a></p>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>
