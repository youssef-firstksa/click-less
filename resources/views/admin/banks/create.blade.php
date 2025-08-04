<x-layouts.admin.master>
    <x-slot name="title">
        {{ __('admin.bank_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('admin.banks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('admin.banks.form', ['bank' => new App\Models\Bank])


                <x-admin.form.actions>
                    <x-admin.button type="submit" class="btn-primary">
                        {{__('admin.general.create')}}
                    </x-admin.button>
                </x-admin.form.actions>

            </form>
        </div>
    </div>
</x-layouts.admin.master>