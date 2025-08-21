<x-layouts.dashboard.master>

    <x-slot name="title">
        {{ __('dashboard.articles_management.edit_title') }}
    </x-slot>

    <form action="{{ route('dashboard.articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')

        @include('dashboard.articles.form')

        <x-form.actions>
            <x-button type="submit" class="btn-success-600">
                {{ __('dashboard.general.update') }}
            </x-button>
        </x-form.actions>
    </form>
</x-layouts.dashboard.master>