@props([
    'id',
    'name',
    'options' => [],
    'selected' => null,
    'multiple' => false,
    'placeholder' => 'select...',
])

<select
    id="{{ $id }}"
    name="{{ $multiple ? $name . '[]' : $name }}"
    {{ $attributes->merge(['class' => 'form-select select2']) }}
    {{ $multiple ? 'multiple' : '' }}
>

    <option value="">{{ $placeholder }}</option>
    @foreach($options as $key => $label)
        <option value="{{ $key }}" @selected($selected == $key || (is_array($selected) && in_array($key, $selected)))>
            {{ $label }}
        </option>
    @endforeach

</select>
