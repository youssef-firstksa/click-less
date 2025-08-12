<div class="row gy-3">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-form.label for="title">{{ __('dashboard.products_management.form.title') }}
                ({{ $properties['native'] }})
                </x-dashboard.form.label>
                <x-form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                    placeholder="{{ __('dashboard.products_management.form.title') }} ({{ $properties['native'] }})"
                    value="{{ old($localeCode . '.title', $product->{'title:' . $localeCode}) }}" />
                <x-form.error :messages="$errors->get($localeCode . '.title')" />
        </div>
    @endforeach

    <div class="col-lg-6">
        <x-form.label for="status">{{ __('dashboard.products_management.form.status') }}</x-dashboard.form.label>

            <x-form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
                placeholder="{{ __('dashboard.general.select') }}" :selected="$product->status?->value" />

            <x-form.error :messages="$errors->get('status')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="bank_id">{{ __('dashboard.products_management.form.bank') }}</x-dashboard.form.label>


            <x-form.select2 id="bank_id" name="bank_id" :options="$bankOptions"
                placeholder="{{ __('dashboard.general.select') }}" :selected="$product?->bank_id" />

            <x-form.error :messages="$errors->get('bank_id')" />
    </div>
</div>
