<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


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
            <a href="/login" class="text-xs font-bold uppercase">&nbsp; Login &nbsp;</a>
            <a href="/register" class="text-xs font-bold uppercase">&nbsp; Register &nbsp;</a>

            <a href="#" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            Latest <span class="text-blue-500">Header Blade</span> News
        </h1>

        <h2 class="inline-flex mt-2">By Lary Laracore <img src="/images/lary-head.svg"
                                                           alt="Head of Lary the mascot"></h2>

        @if( request()->routeIs('home') || request('search') || request()->routeIs('category'))
        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">

            <!--  Category -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
                <div x-data="{ show: false }" @click.away="show=false">

                    <button @click = "show = ! show" class="py-2 pl-3 pr-9 text-sm rounded-xl"> Categories</button>
                    <div x-show="show" class=" py-2 absolute bg-gray-100   pl-3 pr-9 text-sm" style="display: none">

                        @if($categories->count() )
                            @foreach($categories as $category)
                                <a href="/?category={{$category->slug}}" class="block text-left px-3 text-sm leading-6"> {{ucwords($category->name)}}</a>
                            @endforeach
                        @endif

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

            <!-- Search -->
            <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
                <form method="GET" action="" >
                    <input type="text" name="search"
                           placeholder="Find something"
                           class="bg-transparent placeholder-black font-semibold text-sm"
                           value="{{request('search')}}"
                    >
                </form>
            </div>
        </div>
        @endif
    </header>

