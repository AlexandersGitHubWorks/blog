<?php

namespace App\Services;

use App\Models\Post;
use App\Services\Contracts\FileReaderContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class YamlFrontMatterService implements FileReaderContract
{
    public function read($path): Collection
    {
        // Get list of posts than read each one and parse with YamlFrontMatter package
        return collect(File::files(resource_path($path)))
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file);

                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->body(),
                    $document->slug,
                    $document->date
                );
            });
    }
}