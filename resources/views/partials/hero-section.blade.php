<div class="hero-section">
    <div class="hero-section-content">
        <h1 class="bank-title">
            <span>{{ auth()->user()->activeBank()->title }}</span>
            <span>{{ __('agent.general.how_can_we_help_you') }}</span>
        </h1>

        <form>
            <x-form.input type="text" class="bank-search-input"
                placeholder="{{ __('agent.general.search_for_an_article') }}" />
        </form>
    </div>
</div>
