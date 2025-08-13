<div class="row">

    {{-- Products Tabs --}}
    <div class="products-tabs">
        <ul class="products-tabs-list">
            @foreach ($products as $product)
                <li class="products-tabs-item {{ $activeProductTab === $product->id ? 'active' : '' }}"
                    wire:click='setActiveProductTab({{ $product->id }})' key="product_tab_{{ $product->id }}">
                    {{ $product->title }}
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Sections Cards --}}
    @foreach ($sections as $section)
        <div class="col-lg-4">
            <x-card.section key="section_card_{{ $section->id }}" :section="$section" />
        </div>
    @endforeach
</div>
