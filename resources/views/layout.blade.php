<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('app.css');?>" />
    <script src="app.js"></script>
</head>
<body class="antialiased">
    <header>
        <ul class="menu">
            <li> <a href="/"> Home </li></li>
            <li> <a href="/">Posts</a></li>
            <li> <a href="#" >About Us </a></li>

        </ul>
    </header>
    @yield('content')
</body>

</html>
