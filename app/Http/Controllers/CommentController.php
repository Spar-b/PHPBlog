<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'body' => 'required',
        ]);

        Comment::create([
            'body' => $request->body,
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        return back();
    }


}
