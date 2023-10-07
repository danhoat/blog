@if(!empty($post))

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 item-thumbnail">
        <!-- <div>
            <img src="{{ asset('storage/thumbnails/'.$post->thumbnail) }}"  alt="Blog Post illustration" class="rounded-xl" width="150">
        </div> -->

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="/categories/{{$post->category->slug}}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$post->category->name}}</a>

                </div>

                <div class="mt-4">
                    <h1 class="text-3xl post-item-title">
                      <a href="/posts/{{$post->slug}}" > {!!  $post->title !!}</a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                         Published <time>{{ $post->created_at->diffForHumans() }}</time>
                     </span>
                </div>
            </header>

            <div class="text-sm mt-4 post-item-excerpt">
                <p>
                    {{$post->excerpt}}
                </p>

            </div>

            <footer class="flex justify-between items-center mt-8">
                <!-- <div class="flex items-center text-sm">

                    <img src="https://i.pravatar.cc/60" width="60" height="60" class="rounded-xl" />
                    @if( $post->author )
                        <div class="ml-3">
                            <h5 class="font-bold author-link"><a href="/author/{!! $post->author->username !!}">{!!  $post->author->name !!}</a></h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    @endif
                </div> -->

                <div class="btn-act">
                    <a href="/admin/posts/{{$post->id}}/edit"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >
                        Edit
                    </a>
                    <a href="#"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8 btn_del"
                       post_id = "{{$post->id}}"
                    >
                        Delete
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>
@endif
