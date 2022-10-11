<section  class="col-span-8 col-start-5 mt-10 space-y-6">
    <form method="POST" action ="/" class="border border-gray-200  p-6 rounded-xl">
        @csrf
        <header class="flex items-center">

            <img src="https://i.pravatar.cc/60" width="40" height="40" class="rounded-full" />
            <h2 class="ml-4"> Want to participile</h2>
        </header>
        <div class="mt-6">
            <textarea name="comment" class="w-full text-sm focus:outline-none focus:ring" rows="10" placeholder="Leave your message"></textarea>
            <div class="flex justify-end  pt-6  mt-10  border-t  border-gray-200">
                <button class="bg-blue-500 text-white uppercase font-semibold text-xs py-3 px-10 rounded-2xl hover:bg-blue-700" type="submit" > Send</button>
            </div>

        </div>


    </form>
    @foreach($post->comments as $comment)
        <x-comment :comment="$comment"></x-comment>
    @endforeach
</section>
