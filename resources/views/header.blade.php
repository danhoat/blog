<!doctype html>

<title>Laravel From Scratch Blog</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0">
            <a href="/" class="text-xs font-bold uppercase"> &nbsp;Home Page &nbsp;</a>
            <a href="/users" class="text-xs font-bold uppercase">&nbsp; Users &nbsp;</a>

            @auth
                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                    <div x-data="{ show: false }" @click.away="show=false">

                        <button @click = "show = ! show" class="py-2 pl-3 pr-9 text-sm rounded-xl"> Welcome {{auth()->user()->name}}</button>
                        <div x-show="show" class=" py-2 absolute bg-gray-100   pl-3 pr-9 text-sm" style="display: none; width: 180px;">
                            <a href="/admin/posts/create" class=" text-lef text-sm leading-6 "> Add New Post</a>
                           <br /> <a href="/admin/posts/list" class=" text-lef text-sm leading-6 "> List My Post</a>
                        </div>

                    </div>
                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>

                </div>
                <a href="/logout" class="text-xs font-bold uppercase">&nbsp; Logout &nbsp;</a>
            @else
                <a href="/login" class="text-xs font-bold uppercase">&nbsp; Login &nbsp;</a>
                <a href="/register" class="text-xs font-bold uppercase">&nbsp; Register &nbsp;</a>
            @endauth

            <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            <span class="text-blue-500">Laravel Test</span> ITC
        </h1>

        <h2 class="inline-flex mt-2">By Dan Nguyen Gia <img src="/images/lary-head.svg"
                                                           alt="Head of Lary the mascot"></h2>

        @if( request()->routeIs('home') || request('search') || request()->routeIs('category'))
        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8 filter-bar">
            <form method="GET" action="/" >

            <!--  Category -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

                <select name="category">
                    <option value="">Categories</option>
                @if($categories->count() )

                    @foreach($categories as $category)

                        <option value="{{ucwords($category->name)}}"  class="block text-left px-3 text-sm leading-6"> {{ucwords($category->name)}}</option>
                    @endforeach

                @endif
                </select>
                 <input type="text" name="search"
                   placeholder="Find something"
                   class="bg-transparent placeholder-black font-semibold text-sm"
                   value="{{request('search')}}"
            >
            <button type="submit"> Search</button>

            </div>


            </form>
        </div>
        @endif
    </header>

