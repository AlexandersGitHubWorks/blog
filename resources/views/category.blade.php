@extends('layouts.app')

@section('content')
    <ol>
        @foreach($posts as $post)
            <li>{{ $post->title }}</li>
        @endforeach
    </ol>

    <a href="/">Go Back</a>
@endsection