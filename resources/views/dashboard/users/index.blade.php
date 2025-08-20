<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.users_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-table.filters.per-page />
                <x-table.filters.search />
                <x-table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            <div class="d-flex gap-1">
                @can('bulk-create-user')
                    <x-button class="btn-success-600" :href="route('dashboard.users.upload-excel.form')">
                        <iconify-icon icon="solar:upload-square-outline" class="icon text-xl line-height-1"></iconify-icon>
                        {{ __('dashboard.general.upload_file') }}
                    </x-button>
                @endcan

                @can('create-user')
                    <x-button class="btn-primary-600" :href="route('dashboard.users.create')">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        {{ __('dashboard.general.add_new') }}
                    </x-button>
                @endcan
            </div>

        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('dashboard.general.table_id') }}</th>
                            <th scope="col">{{ __('dashboard.users_management.form.name') }}</th>
                            <th scope="col">{{ __('dashboard.users_management.form.email') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.status') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                                <td class="text-center">

                                    @if ($user->status == App\Enums\Status::ACTIVATED)
                                        <x-status status="success" :content="strtoupper(__('dashboard.general.' . $user->status->value))" />
                                    @else
                                        <x-status status="danger" :content="strtoupper(__('dashboard.general.' . $user->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        @can('show-user')
                                            <x-table.actions.show route="{{ route('dashboard.users.show', $user) }}"
                                                :model="$user" />
                                        @endcan

                                        @can('update-user')
                                            <x-table.actions.edit route="{{ route('dashboard.users.edit', $user) }}"
                                                :model="$user" />
                                        @endcan

                                        @can('delete-user')
                                            <x-table.actions.delete route="{{ route('dashboard.users.destroy', $user) }}"
                                                :model="$user" />
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-table.pagination :data="$users" class="mt-3" />

        </div>
    </div>
</x-layouts.dashboard.master>