<x-layout :posts="$posts">
    @section('content')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            <h1 class="text-4xl post-item-title"> List My Tasks</h1>
            <div class="md:flex mb-6 mt-5 bar-filter">
                <div class="md:w-1/6">Filter</div>

                <div class="form frm-task-filter md:flex md:w-5/6">
                    <form action="/admin/tasks/" class="md:flex">
                        <div class="md:w-1/3">
                            <label> Status</label>
                            <select class="act_filter" name="status">
                                <option value="" > All </option>
                                <option value="todo" @if($status == 'todo') selected @endif> To Do</option>
                                <option value="doing" @if($status == 'doing') selected @endif > Doing</option>
                                <option value="done" @if($status == 'done') selected @endif> Done</option>

                            </select>
                        </div>

                    <div class="select-date md:w-1/3">
                        <label>Date</label>
                        <input type="text" readonly name="date" id="datepicker" value="{{$date}}" placeholder="Select Date"  autocomplete="off"></div>
                    <div class="md:w-1/3">

                        <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Search
                        </button>
                    </div>
                </form>


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
                <div class="no-posts">
                    No tasks found.
                </div>
            @endif
        </main>
    @endsection
</x-layout>
