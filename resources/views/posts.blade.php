@extends('layout')
@section('content')

        @foreach($posts as $post)

        <article class="{{ $loop->even ? 'foobar': 'noEvent'}}">
            <h2><a href="posts/{{$post->slug}}">{{ $post->title}}</a></h2>
            <p>{{$post->excerpt}}</p>
            <p>Category: {{$post->cate_name}}</p>
            <p class="postinfo">
                <span class="post-author">Author: {{ $post->author}}</span>
                <span class="post-time">Date: {{ $post->published_at}}</span>
            </p>
        </article>
        @endforeach
@endsection

