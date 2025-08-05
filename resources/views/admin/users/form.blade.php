<div class="row gy-3">
    <div class="col-lg-6">
        <x-admin.form.label for="name">{{__('admin.users_management.form.name')}}</x-admin.form.label>
        <x-admin.form.input name="name" id="name" placeholder="{{__('admin.users_management.form.name')}}"
            value="{{ old('name', $user->name) }}" />
        <x-admin.form.error :messages="$errors->get('name')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="email">{{__('admin.users_management.form.email')}}</x-admin.form.label>
        <x-admin.form.input type="email" name="email" id="email"
            placeholder="{{__('admin.users_management.form.email')}}" value="{{ old('email', $user->email) }}" />
        <x-admin.form.error :messages="$errors->get('email')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="password">{{__('admin.users_management.form.password')}}</x-admin.form.label>
        <x-admin.form.input type="password" name="password" id="password"
            placeholder="{{__('admin.users_management.form.password')}}" />
        <x-admin.form.error :messages="$errors->get('password')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label
            for="password_confirmation">{{__('admin.users_management.form.password_confirmation')}}</x-admin.form.label>
        <x-admin.form.input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="{{__('admin.users_management.form.password_confirmation')}}" />
        <x-admin.form.error :messages="$errors->get('password_confirmation')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="role">{{__('admin.users_management.form.role')}}</x-admin.form.label>
        <x-admin.form.select name="role" id="role">

            <option value="" disabled selected>{{__('admin.general.select')}}</option>

            <option value="admin" @selected(old('role', $user->role) === 'admin')>
                Admin
            </option>

            <option value="supervisor" @selected(old('role', $user->role) === 'supervisor')>
                Supervisor
            </option>
        </x-admin.form.select>

        <x-admin.form.error :messages="$errors->get('role')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="status">{{__('admin.users_management.form.status')}}</x-admin.form.label>
        <x-admin.form.select name="status" id="status">

            <option value="" disabled selected>{{__('admin.general.select')}}</option>

            @foreach(\App\Enums\Status::labels() as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $user->status?->value) === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </x-admin.form.select>

        <x-admin.form.error :messages="$errors->get('status')" />
    </div>
</div>