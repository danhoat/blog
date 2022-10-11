<x-layout >
    @section('content')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="breadcrumb">
            <h1> List Users</h1>
        </div>
        <div class="content">
`       @if(count($users) > 0)
                <p class=""> Total: {{$users->total() }} users.</p>
            <p>&nbsp;</p>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">ID</th>
                            <th scope="col" class="py-3 px-6">Username</th>
                            <th scope="col" class="py-3 px-6">Display Name</th>
                            <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800" >Email</th>
                            <th scope="col" class="py-3 px-6  text-center">Created</th>
                        </tr>
                    </thead>

                    @foreach($users as $user)
                    <tr class=" border-b dark:bg-gray-800 dark:border-gray-700 {{ $loop->even ? 'bg-gray-50':  'bg-white'}} ">

                        <td  class="py-3 px-6">{{$user->id}}</td>
                        <th scope="row" class="py-3 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$user->username}}
                        </th>

                        <td class="py-3 px-6"> {{$user->name}}</td>
                        <td class="py-3 px-6 ">{{$user->email}}</td>
                        <td class=" py-3 px-6 text-center">{{$user->created_at}}</td>
                    </tr>
                    @endforeach

                </table>
            @else
                <h3> No user found.</h3>
            @endif
        </div>
            <div class="container mt-5">
                {{$users->links()}}
                {{--                    <div class="d-flex justify-content-center pagination">--}}
                {{--                        <!-- {!! $users->links() !!} -->--}}
                {{--                        <nav aria-label="Page navigation example" class="pagination">--}}
                {{--                            {{ $users->render("pagination::default") }}--}}
                {{--                        </nav>--}}
                {{--                    </div>--}}
            </div>
        </div>
        </main>
    @endsection

</x-layout>

