<div class="row gy-3">
    <div class="col-12">

        <ul class="nav bordered-tab border border-top-0 border-start-0 border-end-0 d-inline-flex nav-pills mb-16"
            id="pills-tab" role="tablist">

            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                <li class="nav-item" role="presentation">
                    <button class="nav-link px-16 py-10 {{ $loop->first ? 'active' : '' }}" id="{{$localeCode}}-inputs-tab"
                        data-bs-toggle="pill" data-bs-target="#{{$localeCode}}-inputs" type="button" role="tab"
                        aria-controls="{{$localeCode}}-inputs" aria-selected="true">{{ $properties['native']}}</button>
                </li>

            @endforeach
        </ul>

        <div class="tab-content" id="pills-tabContent">
            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <div class="tab-pane fade {{ $loop->first ? ' show active ' : '' }}" id="{{$localeCode}}-inputs"
                    role="tabpanel" aria-labelledby="{{$localeCode}}-inputs-tab" tabindex="0">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <x-dashboard.form.label
                                for="title">{{__('dashboard.bank_management.form.title')}}</x-dashboard.form.label>
                            <x-dashboard.form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                                placeholder="{{__('dashboard.bank_management.form.title')}}"
                                value="{{ old($localeCode . '.title', $bank->{'title:' . $localeCode}) }}" />
                            <x-dashboard.form.error :messages="$errors->get($localeCode . '.title')" />
                        </div>

                        <div class="col-12">
                            <x-dashboard.form.label
                                for="description">{{__('dashboard.bank_management.form.description')}}</x-dashboard.form.label>
                            <x-dashboard.form.textarea name="{{ $localeCode }}[description]"
                                id="description_{{ $localeCode }}"
                                placeholder="{{__('dashboard.bank_management.form.description')}}">{{ old($localeCode . '.description', $bank->{'description:' . $localeCode}) }}</x-dashboard.form.textarea>
                            <x-dashboard.form.error :messages="$errors->get($localeCode . '.description')" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="color">{{__('dashboard.bank_management.form.font_color')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="color" name="font_color" id="font_color"
            placeholder="{{__('dashboard.bank_management.form.font_color')}}"
            value="{{ old('font_color', $bank->font_color) }}" />
        <x-dashboard.form.error :messages="$errors->get('font_color')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label
            for="background_color">{{__('dashboard.bank_management.form.background_color')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="color" name="background_color" id="background_color"
            placeholder="{{__('dashboard.bank_management.form.background_color')}}"
            value="{{ old('background_color', $bank->background_color) }}" />
        <x-dashboard.form.error :messages="$errors->get('background_color')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="logo">{{__('dashboard.bank_management.form.logo')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="file" name="logo" id="logo"
            placeholder="{{__('dashboard.bank_management.form.logo')}}" />
        <x-dashboard.form.error :messages="$errors->get('logo')" />

        @if ($bank->hasMedia('logo'))
            <div class="mt-2">
                <img style="height: 50px;" src="{{ $bank->getFirstMediaUrlSafe('logo') }}" alt="{{ $bank->title }}">
            </div>
        @endif
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="image">{{__('dashboard.bank_management.form.image')}}</x-dashboard.form.label>
        <x-dashboard.form.input type="file" name="image" id="image"
            placeholder="{{__('dashboard.bank_management.form.image')}}" />
        <x-dashboard.form.error :messages="$errors->get('image')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="status">{{__('dashboard.bank_management.form.status')}}</x-dashboard.form.label>

        <x-dashboard.form.select2 id="status" name="status" :options="\App\Enums\Status::labels()"
            placeholder="{{__('dashboard.general.select')}}" :selected="$bank->status?->value" />

        <x-dashboard.form.error :messages="$errors->get('status')" />
    </div>

    <div class="col-lg-6">
        <x-dashboard.form.label for="ai_key">{{__('dashboard.bank_management.form.ai_key')}}</x-dashboard.form.label>
        <x-dashboard.form.input name="ai_key" id="ai_key" placeholder="{{__('dashboard.bank_management.form.ai_key')}}"
            value="{{ old('ai_key', $bank->ai_key) }}" />
        <x-dashboard.form.error :messages="$errors->get('ai_key')" />
    </div>
</div>