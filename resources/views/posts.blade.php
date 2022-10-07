<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Laravel Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo asset('app.css');?>" />
        <script src="app.js"></script>
    </head>
    <body class="antialiased">

        @foreach($posts as $post)

        <article class="{{ $loop->even ? 'foobar': 'noEvent'}}">
            <h2><a href="posts/{{$post->link}}">{{ $post->title}}</a></h2>
            <p>{{$post->excerpt}}</p>
            <p class="postinfo">
                <span class="post-author">Author: {{ $post->author}}</span>
                <span class="post-time">Date: {{ $post->date}}</span>
            </p>
        </article>
        @endforeach;

    </body>
</html>
