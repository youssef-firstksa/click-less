<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.users_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.users.store') }}" method="POST">
                @csrf

                @include('dashboard.users.form', ['user' => new App\Models\User()])


                <x-form.actions>
                    <x-button type="submit" class="btn-primary-600">
                        {{ __('dashboard.general.create') }}
                        </x-button>
                </x-form.actions>

            </form>
        </div>
    </div>
</x-layouts.dashboard.master>