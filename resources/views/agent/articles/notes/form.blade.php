<div class="row gy-3">
    <div class="col-lg-12">
        <x-form.label
            for="article_note_category_id">{{ __('agent.article_notes_management.form.note_category') }}</x-form.label>

        <x-form.select2 id="article_note_category_id" name="article_note_category_id" :options="$noteCategoryOptions"
            placeholder="{{ __('agent.general.select') }}" :selected="$note->category?->id" />

        <x-form.error :messages="$errors->get('article_note_category_id')" />
    </div>

    <div class="col-lg-12">
        <x-form.label for="title">{{ __('agent.article_notes_management.form.title') }}</x-form.label>

        <x-form.input name="title" id="title" placeholder="{{ __('agent.article_notes_management.form.title') }}"
            value="{{ old('title', $note->title) }}" />

        <x-form.error :messages="$errors->get('title')" />
    </div>

    <div class="col-lg-12">
        <x-form.label for="content">
            {{ __('agent.article_notes_management.form.content') }}
        </x-form.label>

        <x-form.textarea name="content" id="content"
            placeholder="{{ __('dashboard.article_notes_management.form.content') }}">{{ old('content', $note->content) }}
        </x-form.textarea>

        <x-form.error :messages="$errors->get('content')" />
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('content', {
            // height: 300,
            filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload') . '?_token=' . csrf_token() }}",
            filebrowserUploadMethod: 'form',
            contentsLangDirection: '{{ in_array(app()->getLocale(), ['ar']) ? 'rtl' : 'ltr' }}'
        });
    </script>

    <script>
        const ckeInterval = setInterval(() => {
            let status = 'pending';
            let counter = 0;

            document.querySelectorAll('.cke_notifications_area').forEach((element) => {
                element.remove()
                status = 'done';
            })

            counter++;

            if (status === 'done' || counter === 30) clearInterval(ckeInterval);
        }, 100)
    </script>
@endpush