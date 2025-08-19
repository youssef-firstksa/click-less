<x-layouts.dashboard.master>

    <x-slot name="title">
        {{ __('dashboard.article_note_categories_management.edit_title') }}
    </x-slot>

    <div class="card radius-12">
        <div class="card-body">
            <form action="{{ route('dashboard.article-note-categories.update', $articleNoteCategory) }}" method="POST">
                @csrf
                @method('PUT')

                @include('dashboard.article-note-categories.form')

                <x-form.actions>
                    <x-button type="submit" class="btn-success-600">
                        {{ __('dashboard.general.update') }}
                    </x-button>
                </x-form.actions>
            </form>
        </div>
    </div>
</x-layouts.dashboard.master>