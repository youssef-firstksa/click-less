<div class="row gy-3">
    <div class="col-lg-6">
        <x-admin.form.label for="name">{{__('admin.admins_management.form.name')}}</x-admin.form.label>
        <x-admin.form.input name="name" id="name" placeholder="{{__('admin.admins_management.form.name')}}"
            value="{{ old('name', $admin->name) }}" />
        <x-admin.form.error :messages="$errors->get('name')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="email">{{__('admin.admins_management.form.email')}}</x-admin.form.label>
        <x-admin.form.input type="email" name="email" id="email"
            placeholder="{{__('admin.admins_management.form.email')}}" value="{{ old('email', $admin->email) }}" />
        <x-admin.form.error :messages="$errors->get('email')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="password">{{__('admin.admins_management.form.password')}}</x-admin.form.label>
        <x-admin.form.input type="password" name="password" id="password"
            placeholder="{{__('admin.admins_management.form.password')}}" />
        <x-admin.form.error :messages="$errors->get('password')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label
            for="password_confirmation">{{__('admin.admins_management.form.password_confirmation')}}</x-admin.form.label>
        <x-admin.form.input type="password" name="password_confirmation" id="password_confirmation"
            placeholder="{{__('admin.admins_management.form.password_confirmation')}}" />
        <x-admin.form.error :messages="$errors->get('password_confirmation')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="role">{{__('admin.admins_management.form.role')}}</x-admin.form.label>
        <x-admin.form.select name="role" id="role">

            <option value="" disabled selected>{{__('admin.general.select')}}</option>

            <option value="admin" @selected(old('role', $admin->role) === 'admin')>
                Admin
            </option>

            <option value="supervisor" @selected(old('role', $admin->role) === 'supervisor')>
                Supervisor
            </option>
        </x-admin.form.select>

        <x-admin.form.error :messages="$errors->get('role')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="status">{{__('admin.admins_management.form.status')}}</x-admin.form.label>
        <x-admin.form.select name="status" id="status">

            <option value="" disabled selected>{{__('admin.general.select')}}</option>

            @foreach(\App\Enums\Status::labels() as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $admin->status?->value) === $value)>
                    {{ $label }}
                </option>
            @endforeach
        </x-admin.form.select>

        <x-admin.form.error :messages="$errors->get('status')" />
    </div>
</div>