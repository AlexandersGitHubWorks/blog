@extends('layouts.app')

@section('content')
    <article>
        <h1>{{ $post->title }}</h1>

        @include('components.posts.metadata')

        <div>{!! $post->body !!}</div>

        <a href="/">Go Back</a>
    </article>
@endsection
