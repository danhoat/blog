
    @include('_post_header')

    @yield('content')

        @if( session()->has('success'))
            <div class="fixed bottom-3 right-0 bg-blue-500 text-white rounded-xl py-2 px-4">
                <p> {{session()->get('success')}}</p>
            </div>
        @endif
    @include('_post_footer')


