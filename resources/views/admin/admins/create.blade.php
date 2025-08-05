<x-layouts.admin.master>
    <x-slot name="title">
        {{ __('admin.admins_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('admin.admins.store') }}" method="POST">
                @csrf

                @include('admin.admins.form', ['admin' => new App\Models\Admin])


                <x-admin.form.actions>
                    <x-admin.button type="submit" class="btn-primary">
                        {{__('admin.general.create')}}
                    </x-admin.button>
                </x-admin.form.actions>

            </form>
        </div>
    </div>
</x-layouts.admin.master>