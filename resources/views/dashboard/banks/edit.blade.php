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

                <x-form.actions>
                    <x-button type="submit" class="btn-success-600">
                        {{ __('dashboard.general.update') }}
                        </x-button>
        </x-form.actions>
            </form>
        </div>
    </div>
</x-layouts.dashboard.master>