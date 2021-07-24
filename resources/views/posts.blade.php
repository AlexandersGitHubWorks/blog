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
                by <a href="/user/{{ $post->author->id }}">{{ $post->author->name }}</a>
                in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </div>

            <div>
                <p>{{ $post->excerpt }}</p>
            </div>
        </article>
    @endforeach
@endsection
