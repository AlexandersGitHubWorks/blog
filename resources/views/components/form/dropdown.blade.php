@props(['name', 'items', 'inputValue' => 'id', 'inputName' => 'name', 'label' => $name, 'selected' => false])

<x-form.field>
    <x-form.label name="{{ $name }}" label="{{ $label }}"/>

    <div class="border border-gray-200 pr-3 w-full text-sm rounded">
        <select name="{{ $name }}" class="w-full py-3 pl-3">
            @foreach($items as $item)
                <option
                    value="{{ $item->{$inputValue} }}"
                    {{ old($name, $selected) == $item->{$inputValue} ? 'selected' : '' }}
                >{{ $item->{$inputName} }}</option>
            @endforeach
        </select>
    </div>

    <x-form.error name="{{ $name }}"/>
</x-form.field>
