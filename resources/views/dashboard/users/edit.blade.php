<x-layouts.dashboard.master>

    <x-slot name="title">
        {{ __('dashboard.users_management.edit_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                @include('dashboard.users.form')

                <x-dashboard.form.actions>
                    <x-dashboard.button type="submit" class="btn-success">
                        {{__('dashboard.general.update')}}
                    </x-admin.button>
                </x-admin.form.actions>
            </form>
        </div>
    </div>
</x-layouts.admin.master>