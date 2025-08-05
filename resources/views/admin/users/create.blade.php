<x-layouts.admin.master>
    <x-slot name="title">
        {{ __('admin.users_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                @include('admin.users.form', ['user' => new App\Models\User])


                <x-admin.form.actions>
                    <x-admin.button type="submit" class="btn-primary">
                        {{__('admin.general.create')}}
                    </x-admin.button>
                </x-admin.form.actions>

            </form>
        </div>
    </div>
</x-layouts.admin.master>