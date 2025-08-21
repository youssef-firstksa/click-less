<div class="row gy-3">
    <div class="col-lg-9">
        <div class="card radius-12">
            <div class="card-body">
                <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16"
                    id="pills-tab" role="tablist">

                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link px-16 py-10 {{ $loop->first ? 'active' : '' }}"
                                id="{{ $localeCode }}-inputs-tab" data-bs-toggle="pill"
                                data-bs-target="#{{ $localeCode }}-inputs" type="button" role="tab"
                                aria-controls="{{ $localeCode }}-inputs"
                                aria-selected="true">{{ $properties['native'] }}</button>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <div class="tab-pane fade {{ $loop->first ? ' show active ' : '' }}" id="{{ $localeCode }}-inputs"
                            role="tabpanel" aria-labelledby="{{ $localeCode }}-inputs-tab" tabindex="0">
                            <div class="col-12 mb-4">
                                <x-form.label for="title">
                                    {{ __('dashboard.articles_management.form.title') }}
                                </x-form.label>

                                <x-form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                                    placeholder="{{ __('dashboard.articles_management.form.title') }}"
                                    value="{{ old($localeCode . '.title', $article->{'title:' . $localeCode}) }}" />
                                <x-form.error :messages="$errors->get($localeCode . '.title')" />

                            </div>

                            <div class="col-12">
                                <x-form.label
                                    for="content">{{ __('dashboard.articles_management.form.content') }}</x-form.label>
                                <x-form.textarea name="{{ $localeCode }}[content]" id="content_{{ $localeCode }}"
                                    placeholder="{{ __('dashboard.articles_management.form.content') }}">{{ old($localeCode . '.content', $article->{'content:' . $localeCode}) }}</x-form.textarea>
                                <x-form.error :messages="$errors->get($localeCode . '.content')" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3">
        <div class="card radius-12">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <x-form.label for="bank_id">{{ __('dashboard.articles_management.form.bank') }}</x-form.label>

                        <x-form.select2 id="bank_id" name="bank_id" :options="$bankOptions"
                            placeholder="{{ __('dashboard.general.select') }}" :selected="$article?->bank_id"
                            data-cascade-element="product_id"
                            data-cascade-url="{{ route('dashboard.products.by-bank') }}" />

                        <x-form.error :messages="$errors->get('bank_id')" />
                    </div>

                    <div class="col-lg-12">
                        <x-form.label
                            for="product_id">{{ __('dashboard.articles_management.form.product') }}</x-form.label>

                        @php
                            $productOptions = isset($productOptions) ? $productOptions : [];
                        @endphp

                        <x-form.select2 id="product_id" name="product_id" :options="$productOptions"
                            placeholder="{{ __('dashboard.general.select') }}" :selected="$article?->product_id"
                            :disabled="!$article?->product_id" data-cascade-element="section_id"
                            data-cascade-url="{{ route('dashboard.sections.by-product') }}" />

                        <x-form.error :messages="$errors->get('product_id')" />
                    </div>

                    <div class="col-lg-12">
                        <x-form.label
                            for="section_id">{{ __('dashboard.articles_management.form.section') }}</x-form.label>

                        @php
                            $sectionOptions = isset($sectionOptions) ? $sectionOptions : [];
                        @endphp

                        <x-form.select2 id="section_id" name="section_id" :options="$sectionOptions"
                            placeholder="{{ __('dashboard.general.select') }}" :selected="$article?->section_id"
                            :disabled="!$article?->section_id" />

                        <x-form.error :messages="$errors->get('section_id')" />
                    </div>

                    <div class="col-lg-12 mb-4">
                        <x-form.label
                            for="published_at">{{ __('dashboard.articles_management.form.published_at') }}</x-form.label>

                        <x-form.input type="datetime-local" name="published_at" id="published_at"
                            placeholder="{{ __('dashboard.articles_management.form.published_at') }}"
                            value="{{ old('published_at', $article->published_at) }}" />

                        <x-form.error :messages="$errors->get('published_at')" />
                    </div>

                    <div class="col-lg-12">
                        <x-form.label for="status">{{ __('dashboard.articles_management.form.status') }}</x-form.label>

                        <x-form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
                            placeholder="{{ __('dashboard.general.select') }}" :selected="$article->status?->value" />

                        <x-form.error :messages="$errors->get('status')" />
                    </div>
                </div>
            </div>
        </div>

        @if ($article->id)
            <x-form.actions>
                <x-button type="submit" class="btn-success-600">
                    {{ __('dashboard.general.update') }}
                </x-button>
            </x-form.actions>
        @else
            <x-form.actions>
                <x-button type="submit" class="btn-primary-600">
                    {{ __('dashboard.general.create') }}
                </x-button>
            </x-form.actions>
        @endif
    </div>
</div>

@push('scripts')
    <script src="https://cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>

    <script>
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $localeName)
            CKEDITOR.replace('content_{{ $localeCode }}', {
                height: 1000,
                filebrowserUploadUrl: "{{ route('dashboard.ckeditor.upload') . '?_token=' . csrf_token() }}",
                filebrowserUploadMethod: 'form',
                contentsLangDirection: '{{ in_array($localeCode, ['ar']) ? 'rtl' : 'ltr' }}',
                enterMode: CKEDITOR.ENTER_P,
                shiftEnterMode: CKEDITOR.ENTER_BR,
                fillEmptyBlocks: false
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

                                    // counter++;

                                    // if (status === 'done' || counter === 30) clearInterval(ckeInterval);
                                }, 100)
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bankSelect = $('#bank_id');
            bankSelect.on('change', (e) => {
                cascadeSelect(e);

                const productSelect = $('#product_id');
                productSelect.on('change', cascadeSelect);
            });
        });
    </script>
@endpush