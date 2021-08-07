<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ $currentCategory->name ?? 'Categories' }}

            <x-icon name="arrow-down" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-slot name="slot">
        <x-dropdown-item href="/" :active='empty(request()->query("category"))'>All</x-dropdown-item>

        @php($httpQueries = request()->except('category', 'page'))

        @foreach($categories as $category)
            <x-dropdown-item
                    href="{{ route('home', array_merge(['category' => $category->slug], $httpQueries)) }}"
                    :active='request("category") == $category->slug'
            >{{ ucfirst($category->name) }}</x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>
