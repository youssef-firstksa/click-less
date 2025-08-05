<x-layouts.admin.master>
    <x-slot name="title">
        {{ __('admin.bank_management.index_title') }}
    </x-slot>



    <div class="card">
        <div
            class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">

            <form action="{{ URL::current() }}" class="d-flex align-items-center flex-wrap gap-3">
                <x-admin.table.filters.per-page />
                <x-admin.table.filters.search />
                <x-admin.table.filters.status :options="['activated' => __('admin.general.activated'), 'disabled' => __('admin.general.disabled')]" />
            </form>

            <x-admin.button class="btn-primary" :href="route('admin.banks.create')">
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
                            <th scope="col">{{__('admin.bank_management.form.title')}}</th>
                            <th scope="col" class="text-center">{{__('admin.general.status')}}</th>
                            <th scope="col" class="text-center">{{__('admin.general.action')}}</th>
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
                                                class="text-md mb-0 fw-normal text-secondary-light">{{$bank->title}}</span>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">

                                    @if ($bank->status == App\Enums\Status::ACTIVATED)
                                        <x-admin.status status="success" :content="strtoupper(__('admin.general.' . $bank->status->value))" />
                                    @else
                                        <x-admin.status status="danger" :content="strtoupper(__('admin.general.' . $bank->status->value))" />
                                    @endif
                                </td>

                                <td class="text-center">
                                    <div class="d-flex align-items-center gap-10 justify-content-center">
                                        <x-admin.table.actions.show route="{{ route('admin.banks.show', $bank) }}"
                                            :model="$bank" />
                                        <x-admin.table.actions.edit route="{{ route('admin.banks.edit', $bank) }}"
                                            :model="$bank" />
                                        <x-admin.table.actions.delete route="{{ route('admin.banks.destroy', $bank) }}"
                                            :model="$bank" />
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <x-admin.table.pagination :data="$banks" />

        </div>
    </div>
</x-layouts.admin.master>