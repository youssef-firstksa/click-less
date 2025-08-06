<div class="row gy-3">
    <div class="col-lg-6">
        <x-dashboard.form.label for="name">{{__('dashboard.users_management.form.name')}}</x-dashboard.form.label>
        <x-dashboard.form.input name="name" id="name" placeholder="{{__('dashboard.users_management.form.name')}}"
            value="{{ old('name', $user->name) }}" />
        <x-dashboard.form.error :messages="$errors->get('name')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="email">{{__('dashboard.users_management.form.email')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="email" name="email" id="email"
            placeholder="{{__('dashboard.users_management.form.email')}}" value="{{ old('email', $user->email) }}" />
        <x-dashboard.form.error :messages="$errors->get('email')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label
            for="password">{{__('dashboard.users_management.form.password')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="password" name="password" id="password"
            placeholder="{{__('dashboard.users_management.form.password')}}" />
        <x-dashboard.form.error :messages="$errors->get('password')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label
            for="password_confirmation">{{__('dashboard.users_management.form.password_confirmation')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="{{__('dashboard.users_management.form.password_confirmation')}}" />
        <x-dashboard.form.error :messages="$errors->get('password_confirmation')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="role">{{__('dashboard.users_management.form.role')}}</x-dashboard.form.label>
        <x-dashboard.form.select name="role" id="role">

            <option value="" disabled selected>{{__('dashboard.general.select')}}</option>

            <option value="admin" @selected(old('role', $user->role) === 'admin')>
                Admin
            </option>

            <option value="supervisor" @selected(old('role', $user->role) === 'supervisor')>
                Supervisor
            </option>
        </x-dashboard.form.select>

        <x-dashboard.form.error :messages="$errors->get('role')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="status">{{__('dashboard.users_management.form.status')}}</x-dashboard.form.label>
        <x-dashboard.form.select name="status" id="status">

            <option value="" disabled selected>{{__('dashboard.general.select')}}</option>

            @foreach(\App\Enums\Status::labels() as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $user->status?->value) === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </x-dashboard.form.select>

        <x-dashboard.form.error :messages="$errors->get('status')" />
    </div>
</div>