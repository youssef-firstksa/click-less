<div class="row gy-3">
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6 mb-4">
            <x-form.label for="title">{{ __('dashboard.bank_management.form.title') }}
                ({{ $properties['native'] }})
            </x-form.label>
            <x-form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                placeholder="{{ __('dashboard.bank_management.form.title') }} ({{ $properties['native'] }})"
                value="{{ old($localeCode . '.title', $bank->{'title:' . $localeCode}) }}" />
            <x-form.error :messages="$errors->get($localeCode . '.title')" />
        </div>
    @endforeach

    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <div class="col-lg-6">
            <x-form.label for="description">{{ __('dashboard.bank_management.form.description') }}
                ({{ $properties['native'] }})
            </x-form.label>
            <x-form.textarea name="{{ $localeCode }}[description]" id="description_{{ $localeCode }}"
                placeholder="{{ __('dashboard.bank_management.form.description') }} ({{ $properties['native'] }})">{{ old($localeCode . '.description', $bank->{'description:' . $localeCode}) }}</x-form.textarea>
            <x-form.error :messages="$errors->get($localeCode . '.description')" />
        </div>
    @endforeach

    <div class="col-lg-6">
        <x-form.label for="font_color">{{ __('dashboard.bank_management.form.font_color') }}</x-form.label>
        <x-form.input type="color" name="font_color" id="font_color"
            placeholder="{{ __('dashboard.bank_management.form.font_color') }}"
            value="{{ old('font_color', $bank->font_color) }}" />
        <x-form.error :messages="$errors->get('font_color')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="background_color">{{ __('dashboard.bank_management.form.background_color') }}</x-form.label>
        <x-form.input type="color" name="background_color" id="background_color"
            placeholder="{{ __('dashboard.bank_management.form.background_color') }}"
            value="{{ old('background_color', $bank->background_color) }}" />
        <x-form.error :messages="$errors->get('background_color')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="logo">{{ __('dashboard.bank_management.form.logo') }}</x-form.label>
        <x-form.input type="file" name="logo" id="logo" placeholder="{{ __('dashboard.bank_management.form.logo') }}" />
        <x-form.error :messages="$errors->get('logo')" />

        @if ($bank->hasMedia('logo'))
            <div class="mt-2">
                <img style="height: 50px;" src="{{ $bank->getFirstMediaUrlSafe('logo') }}" alt="{{ $bank->title }}">
            </div>
        @endif
    </div>

    <div class="col-lg-6">
        <x-form.label for="image">{{ __('dashboard.bank_management.form.image') }}</x-form.label>
        <x-form.input type="file" name="image" id="image"
            placeholder="{{ __('dashboard.bank_management.form.image') }}" />
        <x-form.error :messages="$errors->get('image')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="status">{{ __('dashboard.bank_management.form.status') }}</x-form.label>

        <x-form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
            placeholder="{{ __('dashboard.general.select') }}" :selected="$bank->status?->value" />

        <x-form.error :messages="$errors->get('status')" />
    </div>

    <div class="col-lg-6">
        <x-form.label for="ai_key">{{ __('dashboard.bank_management.form.ai_key') }}</x-form.label>
        <x-form.input name="ai_key" id="ai_key" placeholder="{{ __('dashboard.bank_management.form.ai_key') }}"
            value="{{ old('ai_key', $bank->ai_key) }}" />
        <x-form.error :messages="$errors->get('ai_key')" />
    </div>
</div>