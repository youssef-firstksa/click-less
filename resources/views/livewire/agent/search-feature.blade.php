<div class="search-feature">

    @if ($this->currentRoute === 'agent.index')
        <h1 class="bank-title">
            <span>{{ auth()->user()->activeBank()->title }}</span>
            <span>{{ $searchTitle }}</span>
        </h1>
    @endif

    <div class="search-tabs d-flex justify-content-between">

        <button class="search-tabs-button {{ $searchType === 'normal' ? 'active' : '' }}"
            wire:click='setSearchType("normal")'>
            {{ __('agent.general.normal_search') }}
        </button>

        <button class="search-tabs-button {{ $searchType === 'ai_offline' ? 'active' : '' }}"
            wire:click='setSearchType("ai_offline")'>
            {{ __('agent.general.ai_search_offline') }}
        </button>

        <button class="search-tabs-button {{ $searchType === 'ai_online' ? 'active' : '' }}"
            wire:click='setSearchType("ai_online")'>
            {{ __('agent.general.ai_search_online') }}
        </button>
    </div>

    <form wire:submit='submit' class="search-feature-form">
        <div class="search-feature-input-container">
            <x-form.input type="text" class="search-feature-input" wire:model="search"
                wire:keyup.debounce.500ms='liveSearch' placeholder="{{ $searchPlaceholder }}" />

            <button type="submit" class="search-feature-input-icon">
                <iconify-icon icon="akar-icons:search" />
            </button>
        </div>

        @if($errorMessage)
            <div class="text-danger">{{ $errorMessage }}</div>
        @endif

        <x-form.input type="hidden" name="section_id" :value="request()->get('section_id')" />


        {{-- Start: Live Search Result --}}

        @if (!$liveSearchArticles->isEmpty())
            <div class="search-result">
                @foreach ($liveSearchArticles as $liveSearchArticle)
                    <a href="{{ route('agent.articles.show', $liveSearchArticle) }}" class="search-result-item">
                        <h5 class="result-item-title">{{ $liveSearchArticle->title }}</h5>
                        <p class="result-item-description">{{ $liveSearchArticle->shortContent }}</p>
                    </a>
                @endforeach
            </div>
        @endif

        {{-- End: Live Search Result --}}

        {{-- Start: Ai Response --}}

        @if ($aiResponse)
            <div class="search-result">
                <p class="ai-response">
                    {{ $aiResponse }}
                </p>
            </div>
        @endif

        {{-- End: Ai Response --}}


    </form>


</div>