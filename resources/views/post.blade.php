<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" href="/app.css">
</head>

<body>
    <article>
        {!! $post !!}

        <a href="/">Go Back</a>
    </article>
</body>
</html>
