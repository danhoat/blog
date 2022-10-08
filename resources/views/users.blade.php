@extends('layout')
@section('content')
    <div class="breadcrumb">
        <h1> List Users</h1>
    </div>
    <div class="content">


    @if(count($users) > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>

            @foreach($users as $user)
                    <tr class="{{ $loop->even ? 'foobar': 'noEvent'}}">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
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
            <h3> No user found.</h3>
    @endif
    </div>
@endsection

