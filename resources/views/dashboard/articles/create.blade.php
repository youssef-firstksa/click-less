<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.articles_management.create_title') }}
    </x-slot>


    <form action="{{ route('dashboard.articles.store') }}" method="POST">
        @csrf

        @include('dashboard.articles.form', ['article' => new App\Models\Article()])


        <x-form.actions>
            <x-button type="submit" class="btn-primary-600">
                {{ __('dashboard.general.create') }}
                </x-button>
        </x-form.actions>
    </form>


</x-layouts.dashboard.master>