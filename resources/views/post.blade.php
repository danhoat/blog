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

            <article>
                <h1> <?= $post->title; ?></h1>
                <p><?= $post->content; ?></p>
                <span class="post-time"><?php echo $post->date;?></span>

            </article>
           <a href="/">Go Back</a>

    </body>

</html>
