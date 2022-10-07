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

        <?php foreach($posts as $post): ?>
        <article>
            <h2><a href="posts/{{$post->link}}"><?php echo $post->title; ?></a></h2>
            <p><?php echo $post->excerpt; ?></p>
        </article>
        <?php endforeach; ?>

    </body>
</html>
