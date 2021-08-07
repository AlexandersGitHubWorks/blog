@props(['name', 'rows' => 8])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <textarea
        class="border border-gray-400 p-2 w-full text-sm focus:outline-none focus:ring"
        name="{{ $name }}"
        placeholder="{{ ucwords($name) }}"
        rows="{{ $rows }}"
        required
    >{{ old($name) }}</textarea>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
