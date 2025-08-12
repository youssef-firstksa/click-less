<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.bank_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.banks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('dashboard.banks.form', ['bank' => new App\Models\Bank()])


                <x-form.actions>
                    <x-button type="submit" class="btn-primary-600">
                        {{ __('dashboard.general.create') }}
                        </x-dashboard.button>
                        </x-dashboard.form.actions>

            </form>
        </div>
    </div>
</x-layouts.dashboard.master>
