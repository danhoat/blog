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
                            <th scope="col" class="py-3 px-6">
                                <div class="flex items-center">
                                    ID   <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg>
                                    </a>
                                </div>
                            </th>

                            <th scope="col" class="py-3 px-6">Username</th>
                            <th scope="col" class="py-3 px-6">Display Name</th>
                            <th scope="col" class="py-3 px-6 bg-gray-50 dark:bg-gray-800" >Email</th>
                            <th scope="col" class="py-3 px-6  text-center">
                                <div class=" items-center " >
                                Created   <a href="#" class="inline-block" ><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3 inline-block" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/></svg></a>
                                </div>
                            </th>

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

