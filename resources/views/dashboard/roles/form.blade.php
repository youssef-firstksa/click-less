<div class="row gy-3">

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-dashboard.form.label for="title">{{ __('dashboard.roles_management.form.title') }}
                ({{$properties['native']}})</x-dashboard.form.label>
            <x-dashboard.form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                placeholder="{{ __('dashboard.roles_management.form.title') }} ({{$properties['native']}})"
                value="{{ old($localeCode . '.title', $role->{'title:' . $localeCode}) }}" />
            <x-dashboard.form.error :messages="$errors->get($localeCode . '.title')" />
        </div>
    @endforeach

    <div class="col-lg-6">
        <x-dashboard.form.label for="name">
            <p class="m-0"> {{__('dashboard.roles_management.form.name')}}</p>
            <p class="m-0"> ({{__('dashboard.roles_management.form.name_tips')}})</p>
        </x-dashboard.form.label>
        <x-dashboard.form.input name="name" id="name"
            placeholder="{{__('dashboard.roles_management.form.name_placeholder')}}"
            value="{{ old('name', $role->name) }}" />
        <x-dashboard.form.error :messages="$errors->get('name')" />
    </div>


</div>