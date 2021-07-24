@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            <div>
                <p>{{ $post->category->name }}</p>
            </div>

            <div>
                <p>{{ $post->excerpt }}</p>
            </div>
        </article>
    @endforeach
@endsection
