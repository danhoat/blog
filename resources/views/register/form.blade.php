<x-layout >
    @section('content')

        <main class="max-w-lg mx-auto mt-6  bg-gray-100 rounded-xl space-y-6 p-6">
            <div class="mb-6">
                <h1 class="font-bold text-center text-xl"> Register </h1>
                <form class="mt-10" method="POST" action="/register">
                    @csrf

{{--                    @if (count($errors) > 0)--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs">Email </label>
                        <input required type="email" class="rounded w-full border border-gray-300 p-2 m-height-30"  name="email" placeholder="email@example.com" value="{{ old('email')}}">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs text-gray-700">Username</label>
                        <input required type="text" name="username" class="rounded w-full border border-gray-300 p-2 m-height-30" placeholder="username" value="{{ old('username')}}">
                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs text-gray-700">Display Name</label>
                        <input type="text" name="name" class="rounded w-full border border-gray-300 p-2 m-height-30" placeholder="Display Name">
                    </div>
                    <div class="form-group mb-5">
                        <label for="exampleFormControlInput1">Password </label>
                        <input required type="password" name="password" class="rounded w-full border border-gray-300 p-2 m-height-30" placeholder="Password">
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button type="submit" class=" text-center md:max-w-xs md:w-28 btn button bg-blue-400 text-white rounded py-2 px-8 hover:bg-blue-500 sm:w-full" > Register </button>
                    </div>

                </form>
            </div>
        </main>
    @endsection
</x-layout>
