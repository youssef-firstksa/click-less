<div class="search-feature">

    <h1 class="bank-title">
        <span>{{ auth()->user()->activeBank()->title }}</span>
        <span>{{ $searchTitle }}</span>
    </h1>

    <div class="search-tabs d-flex justify-content-between mb-3">
        <button class="btn btn-secondary" wire:click='setSearchType("normal")'>Normal</button>
        <button class="btn btn-secondary" wire:click='setSearchType("ai_offline")'>Ai Offline</button>
        <button class="btn btn-secondary" wire:click='setSearchType("ai_online")'>Ai Online</button>
    </div>

    <form wire:submit='submit' class="search-feature-form">
        <x-form.input type="text" class="bank-search-input" wire:model="search" wire:keyup.debounce.500ms='liveSearch'
            placeholder="{{ $searchPlaceholder }}" />

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

    </form>


</div>