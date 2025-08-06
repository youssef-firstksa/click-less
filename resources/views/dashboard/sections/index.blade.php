<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.sections_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-dashboard.table.filters.per-page />
                <x-dashboard.table.filters.search />
                <x-dashboard.table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            <x-dashboard.button class="btn-primary-600" :href="route('dashboard.sections.create')">
                <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                {{ __('dashboard.general.add_new') }}
            </x-dashboard.button>

        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{__('dashboard.general.table_id')}}</th>
                            <th scope="col">{{__('dashboard.sections_management.form.title')}}</th>
                            <th scope="col" class="text-center">{{__('dashboard.general.status')}}</th>
                            <th scope="col" class="text-center">{{__('dashboard.general.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sections as $section)
                            <tr>
                                <td>{{ $section->id }}</td>

                                <td>{{ $section->title }}</td>

                                <td class="text-center">

                                    @if ($section->status == App\Enums\Status::ACTIVATED)
                                        <x-dashboard.status status="success" :content="strtoupper(__('dashboard.general.' . $section->status->value))" />
                                    @else
                                        <x-dashboard.status status="danger" :content="strtoupper(__('dashboard.general.' . $section->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <x-dashboard.table.actions.show
                                            route="{{ route('dashboard.sections.show', $section) }}" :model="$section" />
                                        <x-dashboard.table.actions.edit
                                            route="{{ route('dashboard.sections.edit', $section) }}" :model="$section" />
                                        <x-dashboard.table.actions.delete
                                            route="{{ route('dashboard.sections.destroy', $section) }}" :model="$section" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-dashboard.table.pagination :data="$sections" class="mt-3" />
        </div>
    </div>
    </x-layouts.admin.master>