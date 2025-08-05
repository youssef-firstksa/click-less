<x-layouts.dashboard.master>

    <x-slot name="title">
        {{ __('dashboard.bank_management.edit_title') }}
    </x-slot>

    @if ($bank->hasMedia('image'))
        <div>
            <img class="w-100" style="height: 300px;object-fit: cover" src="{{ $bank->getFirstMediaUrlSafe('image') }}"
                alt="">
        </div>
    @endif

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.banks.update', $bank) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('dashboard.banks.form')

                <x-dashboard.form.actions>
                    <x-dashboard.button type="submit" class="btn-success">
                        {{__('dashboard.general.update')}}
                    </x-admin.button>
                </x-admin.form.actions>
            </form>
        </div>
    </div>
</x-layouts.admin.master>