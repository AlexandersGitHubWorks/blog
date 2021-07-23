<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    public static function all()
    {
        $posts = collect(File::files(resource_path('posts')))
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->body(),
                    $document->slug,
                    $document->date
                );
            })
            ->sortByDesc('date');

        return cache()->remember('posts', now()->addMinute(), fn() => $posts);
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug) ?? abort(404);
    }
}