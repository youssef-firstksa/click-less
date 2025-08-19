<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.sections_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.sections.store') }}" method="POST">
                @csrf

                @include('dashboard.sections.form', ['section' => new App\Models\Section()])


                <x-form.actions>
                    <x-button type="submit" class="btn-primary-600">
                        {{ __('dashboard.general.create') }}
                        </x-button>
                </x-form.actions>

            </form>
        </div>
    </div>
</x-layouts.dashboard.master>