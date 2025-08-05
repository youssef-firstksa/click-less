<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.bank_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.banks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('dashboard.banks.form', ['bank' => new App\Models\Bank])


                <x-dashboard.form.actions>
                    <x-dashboard.button type="submit" class="btn-primary">
                        {{__('dashboard.general.create')}}
                    </x-admin.button>
                </x-admin.form.actions>

            </form>
        </div>
    </div>
</x-layouts.admin.master>