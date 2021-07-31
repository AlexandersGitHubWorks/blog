<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        request()->validate([
            'body' => 'required',
        ]);

        $post->comments()->create([
            'body'    => request('body'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Comment is added.');
    }
}
