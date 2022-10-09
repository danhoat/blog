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

            <p class="excerpt"> {!! $post->excerpt !!}</p>
            {{--<p>Category: {{$post->cate_name}}</>--}}


            <p class="postinfo">
                @if($post->category)
                <span class="post-cat">Category:<a href="<?php echo url('/categories');?>/{!!  $post->category->slug !!}"> {!!  $post->category->name !!} </a></span>
                @endif
                <span class="post-author">Author: <a href="/author/{{$post->author->slug}}">{{ $post->author->name}}</a></span>
                <span class="post-time">Date: {{ $post->post_date}}</span>
            </p>
        </article>
        @endforeach
@endsection

