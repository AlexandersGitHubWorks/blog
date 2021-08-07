<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
                ->filter(request()->query())
                ->paginate(6)
                ->withQueryString(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            "title"       => "required|string",
            "excerpt"     => "required",
            "body"        => "required",
            "category_id" => ["required", Rule::exists('categories', 'id')],
            'thumbnail'   => 'required|image',
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        auth()->user()->posts()->create($attributes);

        return redirect()->route('home')->with('success', 'Post has been created.');
    }
}
