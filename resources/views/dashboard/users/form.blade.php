<div class="row gy-3">
    <div class="col-lg-6">
        <x-form.label for="name">{{ __('dashboard.users_management.form.name') }}</x-form.label>
        <x-form.input name="name" id="name" placeholder="{{ __('dashboard.users_management.form.name') }}"
            value="{{ old('name', $user->name) }}" />
        <x-form.error :messages="$errors->get('name')" />
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
        <x-form.select2 name="role_id" id="role_id" :options="$roles" :selected="$user?->role?->id" />

        <x-form.error :messages="$errors->get('role_id')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="status">{{ __('dashboard.users_management.form.status') }}</x-form.label>

        <x-form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
            placeholder="{{ __('dashboard.general.select') }}" :selected="$user->status?->value" />

        <x-form.error :messages="$errors->get('status')" />
    </div>
</div>