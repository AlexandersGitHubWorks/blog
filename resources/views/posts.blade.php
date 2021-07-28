<x-app>
    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @isset($posts)
            <x-posts-grid :posts="$posts"/>
        @endisset
    </main>
</x-app>
