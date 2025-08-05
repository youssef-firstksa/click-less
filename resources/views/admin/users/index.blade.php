<x-layouts.admin.master>
    <x-slot name="title">
        {{ __('admin.users_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-admin.table.filters.per-page />
                <x-admin.table.filters.search />
                <x-admin.table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            <x-admin.button class="btn-primary" :href="route('admin.users.create')">
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
                            <th scope="col">{{__('admin.users_management.form.name')}}</th>
                            <th scope="col">{{__('admin.users_management.form.email')}}</th>
                            <th scope="col" class="text-center">{{__('admin.general.status')}}</th>
                            <th scope="col" class="text-center">{{__('admin.general.action')}}</th>
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
                                        <x-admin.status status="success" :content="strtoupper(__('admin.general.' . $user->status->value))" />
                                    @else
                                        <x-admin.status status="danger" :content="strtoupper(__('admin.general.' . $user->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <x-admin.table.actions.show route="{{ route('admin.users.show', $user) }}"
                                            :model="$user" />
                                        <x-admin.table.actions.edit route="{{ route('admin.users.edit', $user) }}"
                                            :model="$user" />
                                        <x-admin.table.actions.delete route="{{ route('admin.users.destroy', $user) }}"
                                            :model="$user" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-admin.table.pagination :data="$users" />

        </div>
    </div>
</x-layouts.admin.master>