<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.sections_management.index_title') }}
    </x-slot>


    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-table.filters.per-page />
                <x-table.filters.search />
                <x-table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            @can('create-section')
                <x-button class="btn-primary-600" :href="route('dashboard.sections.create')">
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
                                <th scope="col">{{ __('dashboard.general.table_id') }}</th>
                                <th scope="col">{{ __('dashboard.sections_management.form.title') }}</th>
                                <th scope="col" class="text-center">{{ __('dashboard.general.status') }}</th>
                                <th scope="col" class="text-center">{{ __('dashboard.general.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $section->id }}</td>

                                    <td>{{ $section->title }}</td>

                                    <td class="text-center">

                                        @if ($section->status == App\Enums\Status::ACTIVATED)
                                            <x-status status="success" :content="strtoupper(__('dashboard.general.' . $section->status->value))" />
                                        @else
                                            <x-status status="danger" :content="strtoupper(__('dashboard.general.' . $section->status->value))" />
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex align-items-center gap-10 justify-content-center">
                                            @can('show-section')
                                                <x-table.actions.show route="{{ route('dashboard.sections.show', $section) }}"
                                                    :model="$section" />
                                @endif

                                @can('update-section')
                                    <x-table.actions.edit route="{{ route('dashboard.sections.edit', $section) }}"
                                        :model="$section" />
                                    @endif

                                    @can('delete-section')
                                        <x-table.actions.delete route="{{ route('dashboard.sections.destroy', $section) }}"
                                            :model="$section" />
                                        @endif

                            </div>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                        </div>


                        <x-table.pagination :data="$sections" class="mt-3" />
                    </div>
                    </div>
                </x-layouts.dashboard.master>
