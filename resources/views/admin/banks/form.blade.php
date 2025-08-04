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
                            <x-admin.form.label for="title">{{__('admin.bank_management.form.title')}}</x-admin.form.label>
                            <x-admin.form.input name="{{ $localeCode }}[title]" id="title_{{ $localeCode }}"
                                placeholder="{{__('admin.bank_management.form.title')}}"
                                value="{{ old($localeCode . '.title', $bank->{'title:' . $localeCode}) }}" />
                            <x-admin.form.error :messages="$errors->get($localeCode . '.title')" />
                        </div>

                        <div class="col-12">
                            <x-admin.form.label
                                for="description">{{__('admin.bank_management.form.description')}}</x-admin.form.label>
                            <x-admin.form.textarea name="{{ $localeCode }}[description]" id="description_{{ $localeCode }}"
                                placeholder="{{__('admin.bank_management.form.description')}}">{{ old($localeCode . '.description', $bank->{'description:' . $localeCode}) }}</x-admin.form.textarea>
                            <x-admin.form.error :messages="$errors->get($localeCode . '.description')" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="color">{{__('admin.bank_management.form.font_color')}}</x-admin.form.label>
        <x-admin.form.input type="color" name="font_color" id="font_color"
            placeholder="{{__('admin.bank_management.form.font_color')}}"
            value="{{ old('font_color', $bank->font_color) }}" />
        <x-admin.form.error :messages="$errors->get('font_color')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label
            for="background_color">{{__('admin.bank_management.form.background_color')}}</x-admin.form.label>
        <x-admin.form.input type="color" name="background_color" id="background_color"
            placeholder="{{__('admin.bank_management.form.background_color')}}"
            value="{{ old('background_color', $bank->background_color) }}" />
        <x-admin.form.error :messages="$errors->get('background_color')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="logo">{{__('admin.bank_management.form.logo')}}</x-admin.form.label>
        <x-admin.form.input type="file" name="logo" id="logo" placeholder="{{__('admin.bank_management.form.logo')}}" />
        <x-admin.form.error :messages="$errors->get('logo')" />

        <div class="mt-2">
            <img style="height: 70px" src="{{ $bank->getFirstMediaUrlSafe('logo') }}" alt="{{ $bank->title }}">
        </div>
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="image">{{__('admin.bank_management.form.image')}}</x-admin.form.label>
        <x-admin.form.input type="file" name="image" id="image"
            placeholder="{{__('admin.bank_management.form.image')}}" />
        <x-admin.form.error :messages="$errors->get('image')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="status">{{__('admin.bank_management.form.status')}}</x-admin.form.label>
        <x-admin.form.select name="status" id="status">
            <option value="" disabled selected>{{__('admin.general.select')}}</option>
            <option value="activated" @selected(old('status', $bank->status?->value) === App\Enums\Status::ACTIVATED->value)>
                {{__('admin.general.activated')}}
            </option>
            <option value="disabled" @selected(old('status', $bank->status?->value) === App\Enums\Status::DISABLED->value)>
                {{__('admin.general.disabled')}}
            </option>
        </x-admin.form.select>
        <x-admin.form.error :messages="$errors->get('status')" />
    </div>

    <div class="col-lg-6">
        <x-admin.form.label for="ai_key">{{__('admin.bank_management.form.ai_key')}}</x-admin.form.label>
        <x-admin.form.input name="ai_key" id="ai_key" placeholder="{{__('admin.bank_management.form.ai_key')}}"
            value="{{ old('ai_key', $bank->ai_key) }}" />
        <x-admin.form.error :messages="$errors->get('ai_key')" />
    </div>
</div>