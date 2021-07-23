@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                <p>{{ $post->excerpt }}</p>
            </div>
        </article>
    @endforeach
@endsection
