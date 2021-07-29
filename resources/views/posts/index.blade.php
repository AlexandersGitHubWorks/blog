<x-app>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @isset($posts)
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @endisset
    </main>
</x-app>
