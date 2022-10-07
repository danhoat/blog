@extends('layout')
@section('content')

        @foreach($posts as $post)

        <article class="{{ $loop->even ? 'foobar': 'noEvent'}}">
            <h2><a href="posts/{{$post->slug}}">{{ $post->title}}</a></h2>
            <p>{{$post->excerpt}}</p>
            <p class="postinfo">
                <span class="post-author">Author: {{ $post->author}}</span>
                <span class="post-time">Date: {{ $post->date}}</span>
            </p>
        </article>
        @endforeach
@endsection

