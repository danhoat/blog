<x-layout >
    @section('content')

        <main class="max-w-lg mx-auto mt-6  bg-gray-100 rounded-xl space-y-6 p-6">
            <div class="mb-6">
                <h1 class="font-bold text-center text-xl"> Register </h1>
                <form class="mt-10" method="POST" action="/register">
                    @csrf

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs">Email </label>
                        <input type="email" class="form-control w-full border p-2 m-height-30" value="acb@gg.com" name="email" placeholder="email@example.com">
                    </div>
                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs text-gray-700">Username</label>
                        <input type="text" name="username" class="form-control w-full border p-2 m-height-30" placeholder="username">
                    </div>
                    <div class="form-group mb-5">
                        <label class="mb-2 block uppercase font-bold text-xs text-gray-700">Display Name</label>
                        <input type="text" name="name" class="form-control w-full border p-2 m-height-30" placeholder="Display Name">
                    </div>
                    <div class="form-group mb-5">
                        <label for="exampleFormControlInput1">Password </label>
                        <input type="password" name="password" class="form-control w-full border border-gray-400 p-2 m-height-30" placeholder="password">
                    </div>

                    <button type="submit" class=" text-right  btn button bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" > Register</button>



                </form>
            </div>
        </main>
    @endsection
</x-layout>
