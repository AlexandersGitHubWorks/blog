<?php

namespace App\Http\Controllers;

use App\Http\Requests\Forms\PostForm;
use App\Models\Category;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('posts.admin.index', [
            'posts' => Post::latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('posts.admin.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(PostForm $request)
    {
        $request->persist();

        return redirect()->route('home')->with('success', 'Post has been created.');
    }

    public function edit(Post $post)
    {
        return view('posts.admin.edit', [
            'post'       => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(PostForm $request, Post $post)
    {
        $request->persist();

        return back()->with('success', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted');
    }
}
