<x-layouts.admin.master>

    <x-slot name="title">
        {{ __('admin.users_management.edit_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.users.form')

                <x-admin.form.actions>
                    <x-admin.button type="submit" class="btn-success">
                        {{__('admin.general.update')}}
                    </x-admin.button>
                </x-admin.form.actions>
            </form>
        </div>
    </div>
</x-layouts.admin.master>