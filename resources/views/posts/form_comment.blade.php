@auth
    <form method="POST" action = "/savecomment" class="border border-gray-200  p-6 rounded-xl" id="frmComment">
        @csrf
        <header class="flex items-center">

            <img src="https://i.pravatar.cc/60?img={{ auth()->user()->id }}" width="40" height="40" class="rounded-full" />
            <h2 class="ml-4"> Want to participile</h2>
        </header>
        <div class="mt-6">
            <input type="hidden" name="post_id" id="post_id" value="{{$post->id}}">
            <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
            <textarea required name="content" id="content" class="w-full text-sm focus:outline-none focus:ring" rows="6" placeholder="Leave your message"></textarea>
            <div class="flex justify-end  pt-6  mt-6  border-t  border-gray-200">
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-3 px-10 rounded-2xl hover:bg-blue-700" type="submit" > Send</button>
            </div>

        </div>
    </form>
@else
    Please <a href="/login"> login</a> to comment on this post.
@endauth
