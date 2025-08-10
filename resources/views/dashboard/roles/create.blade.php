<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.roles_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.roles.store') }}" method="POST">
                @csrf

                @include('dashboard.roles.form', ['product' => new App\Models\Role])


                <x-dashboard.form.actions>
                    <x-dashboard.button type="submit" class="btn-primary-600">
                        {{__('dashboard.general.create')}}
                    </x-dashboard.button>
                </x-dashboard.form.actions>

            </form>
        </div>
    </div>
    </x-layouts.admin.master>