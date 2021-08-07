@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex justify-between">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="#">Dashboard</a>
                </li>

                <li>
                    <a href="{{ route('post.create') }}"
                       class="{{ request()->routeIs('post.create') ? 'text-blue-500' : '' }}"
                    >Add Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 max-w-3xl border border-gray-200 rounded pt-6 px-12 pb-12">
            {{ $slot }}
        </main>
    </div>
</section>
