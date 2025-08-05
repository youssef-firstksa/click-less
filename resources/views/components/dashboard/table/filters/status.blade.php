@props(['options'])

<select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px" name="status"
    onchange="this.form.submit()">
    <option value="">{{__('dashboard.general.all')}}</option>

    @foreach ($options as $value => $text)
        <option value={{ $value }} @selected(request()->get('status') == $value)>{{ $text }}</option>
    @endforeach
</select>