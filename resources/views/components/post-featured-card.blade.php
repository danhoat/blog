{{--@dump($post->title)--}}
@if(!empty($post))
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8 post-thumbnail">

            <img src="
            @if($post->thumbnail)
                {{ asset('storage/thumbnails/'.$post->thumbnail) }}
            @else
             /images/nothumbnail.jpg

            @endif
            "
             alt="{{$post->title}}" class="rounded-xl"
            >
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    @if($post->category)
                    <a href="/categories/{{$post->category->slug}}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$post->category->name}}</a>
                       @endif
                </div>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="posts/{{$post->slug}}">
                            {{$post->title}}
                        </a>
                    </h1>
                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 excerpt">
                <p> {{$post->excerpt}} </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    @if( $post->author )
                        <img src="https://i.pravatar.cc/60" width="60" height="60" class="rounded-xl" alt="{!! $post->author->username !!}" />
                        <div class="ml-3">
                            <h5 class="font-bold"><a href="/author/{!! $post->author->username !!}">{!!  $post->author->name !!}</a></h5>
                            <h6>{{$post->author->name}}</h6>
                        </div>
                    @endif
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{$post->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

@endif
