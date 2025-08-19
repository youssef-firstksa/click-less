<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.notifications_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-table.filters.per-page />
                <x-table.filters.search />
                <x-table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            @can('create-notification')
                <x-button class="btn-primary-600" :href="route('dashboard.notifications.create')">
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    {{ __('dashboard.general.add_new') }}
                </x-button>
            @endcan

        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('dashboard.general.table_id') }}</th>
                            <th scope="col">{{ __('dashboard.notifications_management.form.title') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.status') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            <tr>
                                <td>{{ $notification->id }}</td>

                                <td>{{ $notification->title }}</td>

                                <td class="text-center">

                                    @if ($notification->status == App\Enums\Status::ACTIVATED)
                                        <x-status status="success" :content="strtoupper(__('dashboard.general.' . $notification->status->value))" />
                                    @else
                                        <x-status status="danger" :content="strtoupper(__('dashboard.general.' . $notification->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        @can('show-notification')
                                            <x-table.actions.show
                                                route="{{ route('dashboard.notifications.show', $notification) }}"
                                                :model="$notification" />
                                        @endcan

                                        @can('update-notification')
                                            <x-table.actions.edit
                                                route="{{ route('dashboard.notifications.edit', $notification) }}"
                                                :model="$notification" />
                                        @endcan

                                        @can('delete-notification')
                                            <x-table.actions.delete
                                                route="{{ route('dashboard.notifications.destroy', $notification) }}"
                                                :model="$notification" />
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-table.pagination :data="$notifications" class="mt-3" />
        </div>
    </div>
</x-layouts.dashboard.master>