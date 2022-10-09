@extends('layout')
@section('content')

    <article>
        <h1 class="title"> <?= $post->title; ?> </h1>

        <p class="detail"> {!! $post->content !!}</p>
        <p class="postinfo">
            <span class="post-author">Author: {{ $post->author->name}}</span>
            <span class="post-time">Date: {{ $post->published_at}}</span>
        </p>

    </article>
    <div class="breadcrumb">
        <a href="/">Go Back</a>
    </div>

@endsection
