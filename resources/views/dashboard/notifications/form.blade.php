<div class="row gy-3">

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-form.label for="title">

                {{ __('dashboard.notifications_management.form.title') }} ({{ $properties['native'] }})

                </x-dashboard.form.label>
                <x-form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                    placeholder="{{ __('dashboard.notifications_management.form.title') }} ({{ $properties['native'] }})"
                    value="{{ old($localeCode . '.title', $notification->{'title:' . $localeCode}) }}" />
                <x-form.error :messages="$errors->get($localeCode . '.title')" />
        </div>
    @endforeach

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6">
            <x-form.label for="description">{{ __('dashboard.notifications_management.form.description') }}
                ({{ $properties['native'] }})
                </x-dashboard.form.label>
                <x-form.textarea name="{{ $localeCode }}[description]" id="description_{{ $localeCode }}"
                    placeholder="{{ __('dashboard.notifications_management.form.description') }} ({{ $properties['native'] }})">{{ old($localeCode . '.description', $notification->{'description:' . $localeCode}) }}</x-dashboard.form.textarea>
                    <x-form.error :messages="$errors->get($localeCode . '.description')" />
        </div>
    @endforeach

    <div class="col-lg-6 mb-4">
        <x-form.label
            for="publish_start_at">{{ __('dashboard.notifications_management.form.publish_start_at') }}</x-dashboard.form.label>

            <x-form.input type="datetime-local" name="publish_start_at" id="publish_start_at"
                placeholder="{{ __('dashboard.notifications_management.form.publish_start_at') }}"
                value="{{ old('publish_start_at', $notification->publish_start_at) }}" />

            <x-form.error :messages="$errors->get('publish_start_at')" />
    </div>

    <div class="col-lg-6 mb-4">
        <x-form.label
            for="publish_end_at">{{ __('dashboard.notifications_management.form.publish_end_at') }}</x-dashboard.form.label>

            <x-form.input type="datetime-local" name="publish_end_at" id="publish_end_at"
                placeholder="{{ __('dashboard.notifications_management.form.publish_end_at') }}"
                value="{{ old('publish_end_at', $notification->publish_end_at) }}" />

            <x-form.error :messages="$errors->get('publish_end_at')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="notification_type">
            {{ __('dashboard.notifications_management.form.notification_type') }}
            </x-dashboard.form.label>

            <x-form.select2 id="notification_type" name="notification_type" :options="\App\Enums\NotificationType::labels()"
                placeholder="{{ __('dashboard.general.select') }}" :selected="$notification?->notification_type?->value" />

            <x-form.error :messages="$errors->get('notification_type')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="notification_view">
            {{ __('dashboard.notifications_management.form.notification_view') }}
            </x-dashboard.form.label>

            <x-form.select2 id="notification_view" name="notification_view" :options="\App\Enums\NotificationView::labels()"
                placeholder="{{ __('dashboard.general.select') }}" :selected="$notification?->notification_view?->value" />

            <x-form.error :messages="$errors->get('notification_view')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="bank_id">{{ __('dashboard.notifications_management.form.bank') }}</x-dashboard.form.label>

            <x-form.select2 id="bank_id" name="bank_id" :options="$bankOptions"
                placeholder="{{ __('dashboard.general.select') }}" :selected="$notification?->bank_id" />

            <x-form.error :messages="$errors->get('bank_id')" />
    </div>

    <div class="col-lg-6">
        <x-form.label
            for="status">{{ __('dashboard.notifications_management.form.status') }}</x-dashboard.form.label>

            <x-form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
                placeholder="{{ __('dashboard.general.select') }}" :selected="$notification->status?->value" />

            <x-form.error :messages="$errors->get('status')" />
    </div>

</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>

    <script>
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $localeName)
            CKEDITOR.replace('description_{{ $localeCode }}', {
                // height: 300,
                filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload') . '?_token=' . csrf_token() }}",
                filebrowserUploadMethod: 'form',
                contentsLangDirection: '{{ in_array($localeCode, ['ar']) ? 'rtl' : 'ltr' }}'
            });
        @endforeach
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
