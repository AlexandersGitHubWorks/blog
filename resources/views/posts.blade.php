<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link rel="stylesheet" href="/app.css">
    </head>

    <body>
        @foreach($posts as $post)
            <article>
                {!! $post !!}
            </article>
        @endforeach
    </body>
</html>
