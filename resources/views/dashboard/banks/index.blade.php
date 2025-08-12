<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.bank_management.index_title') }}
    </x-slot>



    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-table.filters.per-page />
                <x-table.filters.search />
                <x-table.filters.status :options="\App\Enums\Status::labels()" />
            </form>

            @can('create-bank')
                <x-button class="btn-primary-600" :href="route('dashboard.banks.create')">
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    {{ __('dashboard.general.add_new') }}
                    </x-dashboard.button>
                @endcan

        </div>

        <div class="card-body p-24">
            <div class="table-responsive scroll-sm">
                <table class="table bordered-table sm-table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('dashboard.general.table_id') }}</th>
                            <th scope="col">{{ __('dashboard.bank_management.form.title') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.status') }}</th>
                            <th scope="col" class="text-center">{{ __('dashboard.general.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banks as $bank)
                            <tr>
                                <td>{{ $bank->id }}</td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $bank->getFirstMediaUrlSafe('logo') }}" alt=""
                                            class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden"
                                            style="object-fit: contain">
                                        <div class="flex-grow-1">
                                            <span
                                                class="text-md mb-0 fw-normal text-secondary-light">{{ $bank->title }}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">

                                    @if ($bank->status == App\Enums\Status::ACTIVATED)
                                        <x-status status="success" :content="strtoupper(__('dashboard.general.' . $bank->status->value))" />
                                    @else
                                        <x-status status="danger" :content="strtoupper(__('dashboard.general.' . $bank->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        @can('show-bank')
                                            <x-table.actions.show route="{{ route('dashboard.banks.show', $bank) }}"
                                                :model="$bank" />
                                        @endcan

                                        @can('update-bank')
                                            <x-table.actions.edit route="{{ route('dashboard.banks.edit', $bank) }}"
                                                :model="$bank" />
                                        @endcan

                                        @can('delete-bank')
                                            <x-table.actions.delete route="{{ route('dashboard.banks.destroy', $bank) }}"
                                                :model="$bank" />
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-table.pagination :data="$banks" class="mt-3" />
        </div>
    </div>
</x-layouts.dashboard.master>
