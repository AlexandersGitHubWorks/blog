@extends('layouts.app')

@section('content')
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{ $post->title }}
                </a>
            </h1>

            @include('components.posts.metadata')

            <div>
                <p>{{ $post->excerpt }}</p>
            </div>
        </article>
    @endforeach
@endsection
