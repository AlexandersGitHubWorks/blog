<?php

namespace App\Models;

use App\Services\Contracts\FileReaderContract;

class Post
{
    public $title;

    public $excerpt;

    public $body;

    public $slug;

    public $date;

    public function __construct($title, $excerpt, $body, $slug, $date)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->slug = $slug;
        $this->date = $date;
    }

    public static function all(FileReaderContract $fileReader)
    {
        $posts = $fileReader->read('posts')->sortByDesc('date');

        return cache()->remember('posts', now()->addMinute(), fn() => $posts);
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        return static::find($slug) ?? abort(404);
    }
}