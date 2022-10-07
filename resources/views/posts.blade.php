@extends('layout')
@section('content')
    @if( !empty($is_cat))
        <div class="breadcrumb">
        Category: {{$is_cat->name}}
        </div>

    @endif
        @foreach($posts as $post)

        <article class="{{ $loop->even ? 'foobar': 'noEvent'}}">
            <h2 class="title"><a href="<?php echo url('/');?>/posts/{{$post->slug}}">{{ $post->title}}</a></h2>

            <p> {!! $post->excerpt !!}</p>
            {{--<p>Category: {{$post->cate_name}}</>--}}
            <p>Category:<a href="<?php echo url('/categories');?>/{!!  $post->category->slug !!}"> {!!  $post->category->name !!} </a></p>

            <p class="postinfo">
                <span class="post-author">Author: {{ $post->author}}</span>
                <span class="post-time">Date: {{ $post->published_at}}</span>
            </p>
        </article>
        @endforeach
@endsection

