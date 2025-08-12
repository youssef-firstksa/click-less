@props(['id', 'text' => '', 'checked' => false])

<div class="form-switch switch-primary d-flex align-items-center gap-3">
    <input {{$attributes->merge(['class' => 'form-check-input'])}} type="checkbox" role="switch" id="{{$id}}"
        @checked($checked)>

    <label class="form-check-label line-height-1 fw-medium text-secondary-light" for="{{$id}}">
        {{$text}}
    </label>
</div>