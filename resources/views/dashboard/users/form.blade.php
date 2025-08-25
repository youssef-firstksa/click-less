<div class="row gy-3">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-form.label for="name">{{ __('dashboard.users_management.form.name') }}
                ({{ $properties['native'] }})
            </x-form.label>
            <x-form.input name="{{ $localeCode }}[name]" id="name_{{ $localeCode }}"
                placeholder="{{ __('dashboard.users_management.form.name') }} ({{ $properties['native'] }})"
                value="{{ old($localeCode . '.name', $user->{'name:' . $localeCode}) }}" />
            <x-form.error :messages="$errors->get($localeCode . '.name')" />
        </div>
    @endforeach

    <div class="col-lg-6">
        <x-form.label for="hr_id">{{ __('dashboard.users_management.form.hr_id') }}</x-form.label>
        <x-form.input name="hr_id" id="hr_id" placeholder="{{ __('dashboard.users_management.form.hr_id') }}"
            value="{{ old('hr_id', $user->hr_id) }}" />
        <x-form.error :messages="$errors->get('hr_id')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="phone">{{ __('dashboard.users_management.form.phone') }}</x-form.label>
        <x-form.input name="phone" id="phone" placeholder="{{ __('dashboard.users_management.form.phone') }}"
            value="{{ old('phone', $user->phone) }}" />
        <x-form.error :messages="$errors->get('phone')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="email">{{ __('dashboard.users_management.form.email') }}</x-form.label>
        <x-form.input type="email" name="email" id="email"
            placeholder="{{ __('dashboard.users_management.form.email') }}" value="{{ old('email', $user->email) }}" />
        <x-form.error :messages="$errors->get('email')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="password">{{ __('dashboard.users_management.form.password') }}</x-form.label>
        <x-form.input type="password" name="password" id="password"
            placeholder="{{ __('dashboard.users_management.form.password') }}" />
        <x-form.error :messages="$errors->get('password')" />
    </div>

    <div class="col-lg-6">
        <x-form.label
            for="password_confirmation">{{ __('dashboard.users_management.form.password_confirmation') }}</x-form.label>
        <x-form.input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="{{ __('dashboard.users_management.form.password_confirmation') }}" />
        <x-form.error :messages="$errors->get('password_confirmation')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="role_id">{{ __('dashboard.users_management.form.role') }}</x-form.label>
        <x-form.select2 name="role_id" id="role_id" :options="$roles" :selected="old('role_id', $user?->role?->id)" />

        <x-form.error :messages="$errors->get('role_id')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="group">{{ __('dashboard.users_management.form.group') }}</x-form.label>
        <x-form.input name="group" id="group" placeholder="{{ __('dashboard.users_management.form.group') }}"
            value="{{ old('group', $user->group) }}" />
        <x-form.error :messages="$errors->get('group')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="bank_ids">{{ __('dashboard.users_management.form.banks') }}</x-form.label>
        <x-form.select2 name="bank_ids" id="bank_ids" :options="$bankOptions" :selected="old('bank_ids', $userBankIds ?? [])"
            :multiple="true" />

        <x-form.error :messages="$errors->get('bank_ids')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="status">{{ __('dashboard.users_management.form.status') }}</x-form.label>

        <x-form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
            placeholder="{{ __('dashboard.general.select') }}" :selected="old('status', $user?->status?->value)" />

        <x-form.error :messages="$errors->get('status')" />
    </div>
</div>