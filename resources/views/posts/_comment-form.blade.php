@auth
    <form method="POST"
          action="{{ route('comment.store', ['post' => $post->slug]) }}"
          class="border border-gray-200 p-6 rounded-xl"
    >
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                 width="40"
                 height="40"
                 alt="{{ auth()->user()->name }}"
                 class="rounded-full"
            >

            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <div class="mt-6">
            <textarea
                name="body"
                class="w-full text-sm focus:outline-none focus:ring"
                placeholder="Your comment"
                rows="8"
                required
            ></textarea>

            @error('body')<p class="text-red-300 text-xs">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"
            >
                Post
            </button>
        </div>
    </form>
@else
    <p class="mb-10">
        <a href="{{ route('register.show') }}" class="hover:underline font-semibold">Register</a> or
        <a href="{{ route('login.show') }}" class="hover:underline font-semibold">log in</a> to leave a comment.
    </p>
@endauth
