@extends('layout')
@section('content')

    <article>
        <h1> <?= $post->title; ?></h1>

        <p> {!! $post->content !!}</p>
        <p class="postinfo">
            <span class="post-author">Author: {{ $post->author}}</span>
            <span class="post-time">Date: {{ $post->published_at}}</span>
        </p>

    </article>
    <div class="breadcrumb">
        <a href="/">Go Back</a>
    </div>

@endsection
