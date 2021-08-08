<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['author', 'category'];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */
    public function readableTime()
    {
        return $this->created_at->diffForHumans();
    }

    public function removeImage(string $path = null)
    {
        $path = $path ?? $this->thumbnail;

        $fullPath = public_path("/storage/{$path}");

        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhere('excerpt', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', fn($query) => $query->where('slug', $category));
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            $query->whereHas('author', fn($query) => $query->where('username', $author));
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors & Mutators
    |--------------------------------------------------------------------------
    */
    public function setTitleAttribute($title)
    {
        $slug = Str::slug($title);

        if ($existedPosts = Post::where('slug', 'like', "$slug%")->count()) {
            $slug .= $existedPosts;
        }

        $this->attributes['slug'] = $slug;
        $this->attributes['title'] = $title;
    }

    public function setThumbnailAttribute($value)
    {
        // Make constant forward directory separator in thumbnail path
        $this->attributes['thumbnail'] = DIRECTORY_SEPARATOR . ltrim($value, DIRECTORY_SEPARATOR);
    }

    /*
    |--------------------------------------------------------------------------
    | Model Events
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::deleted(function ($post) {
            $post->removeImage();
        });

        static::updating(function ($post) {
            if (request()->has('thumbnail')) {
                $post->removeImage($post->getOriginal('thumbnail'));
            }
        });
    }
}
