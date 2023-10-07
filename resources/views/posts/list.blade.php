
<x-layout :posts="$posts">
    @section('content')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            <h1 class="text-4xl post-item-title"> My Posts</h1>
            @if( $posts )

            <div class="lg:grid lg:grid-cols-1">
                @foreach($posts as $post)
                    <x-list-item :post="$post" />
                @endforeach
            </div>

            @else
            No post found
            @endif
        </main>
    @endsection
</x-layout>
