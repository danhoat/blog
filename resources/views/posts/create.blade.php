<x-layout>
    @section('content')
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <h1 class="block uppercase tracking-wide  space-y-6 uppercase tracking-wide "> Create New Post </h1>

        <div class="block p-6 rounded-lg shadow-lg bg-white ">
            @if($errors)
{{--               {{$errors}}--}}
            @endif
            <form method="POST" action="/admin/posts/create" enctype="multipart/form-data">
                @csrf
                <div class="md:flex mb-6 mt-5">
                    <div class="md:w-1/6">
                        <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inline-full-name">
                            Post Title
                        </label>
                    </div>
                    <div class="md:w-5/6">
                        <input required  value="{{old('title')}}" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" name="title" type="text">
                        @error('title')
                        <p class="text-red-500 text-xs mt-2"  > {{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex  mb-6 mt-5">
                    <div class="md:w-1/6">
                        <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inline-full-name">
                           Excerpt
                        </label>
                    </div>
                    <div class="md:w-5/6">
                        <textarea required id="excerpt" name="excerpt" rows="3" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                        @error('excerpt')
                        <p class="text-red-500 text-xs mt-2"  > {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex mb-6 mt-5">
                    <div class="md:w-1/6">
                        <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inline-full-name">
                          Thumbnail
                        </label>
                    </div>
                    <div class="md:w-5/6">
                        <input required  value="{{old('file')}}" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                               id="thumbnail" name="thumbnail" type="file"  accept="image/*" >
                        @error('thumbnail')
                        <p class="text-red-500 text-xs mt-2"  > {{$message}}</p>
                        @enderror
                    </div>
                </div>
                <!-- Category !-->
                <div class="md:flex md:items-center mb-6 mt-5">
                    <div class="md:w-1/6">
                        <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inline-full-name">
                           Category
                        </label>
                    </div>
                    <div class="md:w-5/6 relative">
                        @php
                        $categories = \App\Models\Category::all();
                        @endphp
                        <select name="category_id" " required class="inline-block appearance-none w-full bg-white border border-gray-200 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                            @if($categories)
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                        @error('category_id')
                        <p class="text-red-500 text-xs mt-2"  >The category field is required.</p>
                        @enderror
                    </div>
                </div>
                <!--End Category !-->

                <div class="md:flex mb-6 mt-5">
                    <div class="md:w-1/6">
                        <label class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="inline-full-name">
                            Content
                        </label>
                    </div>
                    <div class="md:w-5/6">
                        <textarea required id="content" name="content" rows="10" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                    </div>
                </div>

                <div class="w-full mt-5 text-right item-right align-right">
                <button type="submit" class="

      px-9
      py-3
      bg-blue-600
      text-white
      font-weigh
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out">Save</button>
                </div>
            </form>
        </div>
    </main>
    @endsection

</x-layout>
