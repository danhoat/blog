<x-layout :posts="$posts">
    @section('content')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            <h1 class="text-4xl post-item-title"> List My Tasks</h1>
            <div class="lg:grid lg:grid-cols-3">
                <div class="">Filter</div>
                    <div class="form">
                        <select class="act_filter">
                            <option value="approved" @if($status == 'approved') selected @endif> Approved</a></option>
                            <option value="process" @if($status == 'process') selected @endif >In Process</a></option>
                            <option value="closed" @if($status == 'closed') selected @endif> Closed</a></option>
                            <option value="draft" @if($status == 'draft') selected @endif> Draft</a></option>
                        </select>
                    </div>
            </div>
           @if(count($posts) > 0)

            <div class="lg:grid lg:grid-cols-1">
                @foreach($posts as $post)
                    <x-list-item :post="$post" />
                @endforeach
            </div>
             {{ $posts->links() }}
            @else
                No tasks found.
            @endif
        </main>
    @endsection
</x-layout>
