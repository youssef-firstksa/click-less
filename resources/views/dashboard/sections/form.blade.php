<div class="row gy-3">
    <div class="col-12">

        <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16"
            id="pills-tab" role="tablist">

            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-16 py-10 {{ $loop->first ? 'active' : '' }}"
                        id="{{ $localeCode }}-inputs-tab" data-bs-toggle="pill" data-bs-target="#{{ $localeCode }}-inputs"
                        type="button" role="tab" aria-controls="{{ $localeCode }}-inputs"
                        aria-selected="true">{{ $properties['native'] }}</button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content" id="pills-tabContent">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <div class="tab-pane fade {{ $loop->first ? ' show active ' : '' }}" id="{{ $localeCode }}-inputs"
                    role="tabpanel" aria-labelledby="{{ $localeCode }}-inputs-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <x-dashboard.form.label
                                for="title">{{ __('dashboard.sections_management.form.title') }}</x-dashboard.form.label>
                            <x-dashboard.form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                                placeholder="{{ __('dashboard.sections_management.form.title') }}"
                                value="{{ old($localeCode . '.title', $section->{'title:' . $localeCode}) }}" />
                            <x-dashboard.form.error :messages="$errors->get($localeCode . '.title')" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label
            for="bank_id">{{ __('dashboard.sections_management.form.bank') }}</x-dashboard.form.label>

        <x-dashboard.form.select2 id="bank_id" name="bank_id" :options="$bankOptions"
            placeholder="{{__('dashboard.general.select')}}" :selected="$section?->bank_id"
            data-cascade-element="product_id" data-cascade-url="{{ route('dashboard.products.by-bank') }}" />

        <x-dashboard.form.error :messages="$errors->get('bank_id')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="product_id">{{ __('dashboard.sections_management.form.product')
            }}</x-dashboard.form.label>

        @php
            $productOptions = isset($productOptions) ? $productOptions : [];
        @endphp

        <x-dashboard.form.select2 id="product_id" name="product_id" :options="$productOptions"
            placeholder="{{__('dashboard.general.select')}}" :selected="$section?->product_id"
            :disabled="!$section?->product_id" />

        <x-dashboard.form.error :messages="$errors->get('product_id')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label
            for="status">{{__('dashboard.sections_management.form.status')}}</x-dashboard.form.label>

        <x-dashboard.form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
            placeholder="{{__('dashboard.general.select')}}" :selected="$section->status?->value" />

        <x-dashboard.form.error :messages="$errors->get('status')" />
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const bankSelect = $('#bank_id');
            bankSelect.on('change', cascadeSelect);
        });
    </script>
@endpush