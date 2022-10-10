<x-layout :categories="$categories">
    @section('content')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


            @if( $posts->count() )
                @if(request('search'))
                    <p> Search Results: {{$posts->count()}} posts found.</p>
                @else
                <x-post-featured-card :post="$posts[0]" />
                @endif
            <div class="lg:grid lg:grid-cols-2">
                @foreach($posts->skip(1) as $post)
                    <x-post-card :post="$post" />
                @endforeach
            </div>
            @else
            No post found
            @endif
        </main>
    @endsection
</x-layout>
