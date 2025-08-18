@if (request()->routeIs('agent.index'))
    <style>
        .dashboard-main-body {
            padding-top: 400px;
        }

        .hero-section {
            min-height: 330px;
        }
    </style>
@endif

<div class="hero-section">
    <div class="hero-section-content">
        <livewire:agent.search-feature />
        {{-- @if (request()->routeIs('agent.index'))
        <h1 class="bank-title">
            <span>{{ auth()->user()->activeBank()->title }}</span>
            <span>{{ __('agent.general.how_can_we_help_you') }}</span>
        </h1>
        @endif

        <form action="{{ route('agent.articles.index') }}">
            <x-form.input type="text" class="bank-search-input" name="search"
                placeholder="{{ __('agent.general.search_for_an_article') }}" :value="request()->get('search')" />

            <x-form.input type="hidden" name="section_id" :value="request()->get('section_id')" />
        </form> --}}
    </div>
</div>