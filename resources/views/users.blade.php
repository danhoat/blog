@extends('layout')
@section('content')
    <h1> List Users</h1>
    @if($users)

        @foreach($users as $user)
            <p class="{{ $loop->even ? 'foobar': 'noEvent'}}">
                {{$user->username}} {{$user->email}}
            </p>
        @endforeach
        <div class="container mt-5">
            <div class="d-flex justify-content-center pagination">
                <!-- {!! $users->links() !!} -->
                <nav aria-label="Page navigation example">
                    {{ $users->render("pagination::default") }}
                </nav>
            </div>
        </div>

    @else
        No user found
    @endif

@endsection

