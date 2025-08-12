<x-layouts.dashboard.master>

    <x-slot name="title">
        {{ __('dashboard.articles_management.edit_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.articles.update', $article) }}" method="POST">
                @csrf
                @method('PUT')

                @include('dashboard.articles.form')

                <x-form.actions>
                    <x-button type="submit" class="btn-success-600">
                        {{ __('dashboard.general.update') }}
                        </x-dashboard.button>
                        </x-dashboard.form.actions>
            </form>
        </div>
    </div>
</x-layouts.dashboard.master>
