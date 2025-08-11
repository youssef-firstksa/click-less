<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.roles_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-dashboard.table.filters.per-page />
                <x-dashboard.table.filters.search />
            </form>

            @can('create-role')
            <x-dashboard.button class="btn-primary-600" :href="route('dashboard.roles.create')">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                {{ __('dashboard.general.add_new') }}
            </x-dashboard.button>
            @endif
        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('dashboard.general.table_id')}}</th>
                            <th scope="col">{{__('dashboard.roles_management.form.name')}}</th>
                            <th scope="col">{{__('dashboard.roles_management.form.title')}}</th>
                            <th scope="col" class="text-center">{{__('dashboard.general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>

                            <td>{{ $role->name }}</td>

                            <td>{{ $role->title }}</td>

                            <td class="text-center">
                                <div class="d-flex align-items-center gap-10 justify-content-center">
                                    @can('show-role')
                                    <x-dashboard.table.actions.show route="{{ route('dashboard.roles.show', $role) }}"
                                        :model="$role" />
                                    @endif

                                    @can('update-role')
                                    <x-dashboard.table.actions.edit route="{{ route('dashboard.roles.edit', $role) }}"
                                        :model="$role" />
                                    @endif

                                    @can('delete-role')
                                    <x-dashboard.table.actions.delete
                                        route="{{ route('dashboard.roles.destroy', $role) }}" :model="$role" />
                                    @endif

                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-dashboard.table.pagination :data="$roles" class="mt-3" />
        </div>
    </div>
    </x-layouts.admin.master>