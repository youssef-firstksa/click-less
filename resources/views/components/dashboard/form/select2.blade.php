@props([
    'id',
    'name',
    'options' => [],
    'selected' => null,
    'multiple' => false,
    'placeholder' => 'select...',
    'ajaxUrl' => null,
])

<select
    id="{{ $id }}"
    name="{{ $multiple ? $name . '[]' : $name }}"
    {{ $attributes->merge(['class' => 'form-select select2']) }}
    {{ $multiple ? 'multiple' : '' }}
>
    @if (!$ajaxUrl)
        <option value="">{{ $placeholder }}</option>
        @foreach($options as $key => $label)
            <option value="{{ $key }}" @selected($selected == $key || (is_array($selected) && in_array($key, $selected)))>
                {{ $label }}
            </option>
        @endforeach
    @endif
</select>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const select = $('#{{ $id }}');        
        const isAjax = '{{ $ajaxUrl }}' !== '';

        select.select2({
            placeholder: '{{ $placeholder }}',
            @if($ajaxUrl)
            ajax: {
                url: '{{ $ajaxUrl }}',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
            @endif
        });
    });
</script>
