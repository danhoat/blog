@extends('layout')
@section('content')
    <h1> List Users</h1>
    @if($users)
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>

            @foreach($users as $user)
                    <tr class="{{ $loop->even ? 'foobar': 'noEvent'}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
        @endforeach
        </table>
        <div class="container mt-5">
            <div class="d-flex justify-content-center pagination">
                <!-- {!! $users->links() !!} -->
                <nav aria-label="Page navigation example" class="pagination">
                    {{ $users->render("pagination::default") }}
                </nav>
            </div>
        </div>

    @else
        No user found
    @endif

@endsection

