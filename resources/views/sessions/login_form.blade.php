<x-layout >
    @section('content')

        <main class="max-w-lg mx-auto mt-6  bg-gray-100 rounded-xl space-y-6 p-6">
            <div class="mb-6">
                <h1 class="font-bold text-center text-xl"> Login </h1>
                <form class="mt-10" method="POST" action="login">
                    @csrf

                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs">Email/Username </label>
                        <input type="text" class="rounded w-full border border-gray-300 p-2 m-height-30 rounded"  name="email" placeholder="Email/Username">
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs">Password </label>
                        <input type="password" name="password" class="rounded w-full border  border-gray-300 p-2 m-height-30" placeholder="password">
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
