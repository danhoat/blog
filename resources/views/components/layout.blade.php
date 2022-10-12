@include('header')

@yield('content')

@if( session()->has('success'))
    <div x-data="{show: true}"
         x-init="setTimeout(() => show = false, 1500)"
         x-show="show"
         class="fixed bottom-2 right-0 bg-blue-500 text-white rounded-xl py-3 px-5">
        <p> {{session()->get('success')}}</p>
    </div>
@endif
@include('footer')


