@props(['products' => []])


@php
    if (count($products) === 0) {
        $products = App\Models\Product::whereCanAccess()->withWhereHas('sections')->get();
    }
   @endphp


<div {{ $attributes->merge(['class' => 'accordion products-accordion', 'id' => 'products-accordion']) }}>

    @foreach ($products as $product)
        <div class="accordion-item mb-1">
            <h2 class="accordion-header" id="product-{{ $product->id }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-product-{{ $product->id }}" aria-expanded="false"
                    aria-controls="collapse-product-{{ $product->id }}">
                    {{ $product->title }}
                </button>
            </h2>

            <div id="collapse-product-{{ $product->id }}" class="accordion-collapse collapse"
                aria-labelledby="product-{{ $product->id }}" data-bs-parent="#products-accordion">
                <div class="accordion-body pt-3">
                    <ul class="sections-list">
                        @foreach ($product->sections as $section)
                            <li>
                                <a href="{{ route('agent.articles.index', ['section_id' => $section->id]) }}">
                                    {{ $section->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div>