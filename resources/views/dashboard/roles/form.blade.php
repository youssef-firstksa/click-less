<div class="row gy-3">

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-form.label for="title">{{ __('dashboard.roles_management.form.title') }}
                ({{ $properties['native'] }})
            </x-form.label>
            <x-form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                placeholder="{{ __('dashboard.roles_management.form.title') }} ({{ $properties['native'] }})"
                value="{{ old($localeCode . '.title', $role->{'title:' . $localeCode}) }}" />
            <x-form.error :messages="$errors->get($localeCode . '.title')" />
        </div>
    @endforeach

    <div class="col-lg-6">
        <x-form.label for="name">
            <p class="m-0"> {{ __('dashboard.roles_management.form.name') }}</p>
            <p class="m-0"> ({{ __('dashboard.roles_management.form.name_tips') }})</p>
        </x-form.label>
        <x-form.input name="name" id="name" placeholder="{{ __('dashboard.roles_management.form.name_placeholder') }}"
            value="{{ old('name', $role->name) }}" />
        <x-form.error :messages="$errors->get('name')" />
    </div>

    <div class="col-lg-12">
        @foreach ($permissionOptions as $group => $permissions)
            <h5 class="mb-3">{{ __("permissions.groups.{$group}") }}</h5>

            <div class="border border-primary-600 p-3 pb-0 mb-3">
                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="col-lg-4 mb-3">
                            <x-form.switch :id="$permission->name" name="permission_ids[]" :value="$permission->id"
                                :text="$permission->title" :checked="in_array($permission->id, $role->permissions->pluck('id')->toArray())" />
                        </div>
                    @endforeach
                </div>
            </div>

            <hr class="mb-3" />
        @endforeach
    </div>


</div>