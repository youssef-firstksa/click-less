<div class="row gy-3">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-dashboard.form.label for="title">{{ __('dashboard.sections_management.form.title') }}
                ({{$properties['native']}}) </x-dashboard.form.label>
            <x-dashboard.form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                placeholder="{{ __('dashboard.sections_management.form.title') }} ({{$properties['native']}})"
                value="{{ old($localeCode . '.title', $section->{'title:' . $localeCode}) }}" />
            <x-dashboard.form.error :messages="$errors->get($localeCode . '.title')" />
        </div>
    @endforeach

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