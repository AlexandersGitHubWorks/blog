@props(['name', 'items', 'inputValue' => 'id', 'inputName' => 'name', 'label' => $name])

<x-form.field>
    <x-form.label name="{{ $name }}" label="{{ $label }}"/>

    <select name="{{ $name }}"
            class="border border-gray-400 p-3 w-full text-sm"
    >
        @foreach($items as $item)
            <option
                value="{{ $item->{$inputValue} }}"
                {{ old('category_id') == $item->{$inputValue} ? 'selected' : '' }}
            >{{ $item->{$inputName} }}</option>
        @endforeach
    </select>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
