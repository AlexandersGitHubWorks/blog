<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

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

    public function edit(Post $post)
    {
        return view('posts.admin.edit', [
            'post'       => $post,
            'categories' => Category::all(),
        ]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title'       => 'required|string',
            'excerpt'     => 'required',
            'body'        => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail'   => 'image',
        ]);

        if (request()->has('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post has been updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted');
    }
}
