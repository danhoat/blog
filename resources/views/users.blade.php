<x-layout >
    @section('content')
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="breadcrumb">
            <h1> List Users</h1>
        </div>
        <div class="content">


            @if(count($users) > 0)
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Display Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    @foreach($users as $user)
                        <tr class="{{ $loop->even ? 'foobar': 'noEvent'}}">
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="container mt-5">
                    {{$users->links()}}
{{--                    <div class="d-flex justify-content-center pagination">--}}
{{--                        <!-- {!! $users->links() !!} -->--}}
{{--                        <nav aria-label="Page navigation example" class="pagination">--}}
{{--                            {{ $users->render("pagination::default") }}--}}
{{--                        </nav>--}}
{{--                    </div>--}}
                </div>

            @else
                <h3> No user found.</h3>
            @endif
        </div>
        </main>
    @endsection

</x-layout>

