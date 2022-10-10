<x-layout >
    @section('content')

        <main class="max-w-lg mx-auto mt-6  bg-gray-100 rounded-xl space-y-6 p-6">
            <div class="mb-6">
                <h1 class="font-bold text-center text-xl"> Login </h1>
                <form class="mt-10" method="POST" action="/login">
                    @csrf

                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs">Email/Username </label>
                        <input type="text" class="form-control w-full border p-2 m-height-30"  name="email" placeholder="Email/Username">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="exampleFormControlInput1">Password </label>
                        <input type="password" name="password" class="form-control w-full border border-gray-400 p-2 m-height-30" placeholder="password">
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class=" text-right  btn button bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" > Login</button>
                </form>
            </div>
        </main>
    @endsection
</x-layout>
