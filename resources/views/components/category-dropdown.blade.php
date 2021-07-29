<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ ucwords($currentCategory->name ?? 'Categories') }}

            <x-icon name="arrow-down" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-slot name="slot">
        <x-dropdown-item href="/" :active='empty(request()->query("category"))'>All</x-dropdown-item>

        @foreach($categories as $category)
            <x-dropdown-item
                    href="{{ request()->fullUrlWithQuery(['category' => $category->slug]) }}"
                    :active='request("category") == $category->slug'
            >{{ ucfirst($category->name) }}</x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>