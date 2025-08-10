<x-layouts.dashboard.master>

    <x-slot name="title">
        {{ __('dashboard.notifications_management.edit_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.notifications.update', $notification->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('dashboard.notifications.form')

                <x-dashboard.form.actions>
                    <x-dashboard.button type="submit" class="btn-success-600">
                        {{__('dashboard.general.update')}}
                    </x-dashboard.button>
                </x-dashboard.form.actions>
            </form>
        </div>
    </div>
    </x-layouts.admin.master>