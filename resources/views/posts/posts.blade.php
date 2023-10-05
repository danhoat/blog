
<x-layout :categories="$categories">
    @section('content')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


            @if( $posts )
                @if(request('search') || request('category'))
                    <p> Search Results: {{$posts->total()}} posts found.</p>
                @endif
                <x-post-featured-card :post="$posts[0]" />

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
