<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="/app.css">
    </head>

    <body>
        @foreach($posts as $post)
            <article>
                <h1>
                    <a href="/post/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>

                <div>{{ $post->excerpt }}</div>
            </article>
        @endforeach
    </body>
</html>
