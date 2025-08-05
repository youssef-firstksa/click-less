<x-layouts.admin.master>
    <x-slot name="title">
        {{ __('admin.admins_management.index_title') }}
    </x-slot>



    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-admin.table.filters.per-page />
                <x-admin.table.filters.search />
                <x-admin.table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            <x-admin.button class="btn-primary" :href="route('admin.admins.create')">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                {{ __('admin.general.add_new') }}
            </x-admin.button>

        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('admin.general.table_id')}}</th>
                            <th scope="col">{{__('admin.admins_management.form.name')}}</th>
                            <th scope="col">{{__('admin.admins_management.form.email')}}</th>
                            <th scope="col" class="text-center">{{__('admin.general.status')}}</th>
                            <th scope="col" class="text-center">{{__('admin.general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>

                                <td class="text-center">

                                    @if ($admin->status == App\Enums\Status::ACTIVATED)
                                        <x-admin.status status="success" :content="strtoupper(__('admin.general.' . $admin->status->value))" />
                                    @else
                                        <x-admin.status status="danger" :content="strtoupper(__('admin.general.' . $admin->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <x-admin.table.actions.show route="{{ route('admin.admins.show', $admin) }}"
                                            :model="$admin" />
                                        <x-admin.table.actions.edit route="{{ route('admin.admins.edit', $admin) }}"
                                            :model="$admin" />
                                        <x-admin.table.actions.delete route="{{ route('admin.admins.destroy', $admin) }}"
                                            :model="$admin" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-admin.table.pagination :data="$admins" />

        </div>
    </div>
</x-layouts.admin.master>