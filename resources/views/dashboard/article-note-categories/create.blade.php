<x-layouts.dashboard.master>
    <x-slot name="title">
        {{ __('dashboard.article_note_categories_management.create_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.article-note-categories.store') }}" method="POST">
                @csrf

                @include('dashboard.article-note-categories.form', ['articleNoteCategory' => new App\Models\ArticleNoteCategory()])


                <x-form.actions>
                    <x-button type="submit" class="btn-primary-600">
                        {{ __('dashboard.general.create') }}
                    </x-button>
                </x-form.actions>

            </form>
        </div>
    </div>
</x-layouts.dashboard.master>