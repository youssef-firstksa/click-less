<x-layouts.agent.master>

    <x-slot name="title">
        كل المقالات
    </x-slot>

    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                @foreach ($articles as $article)
                    <x-card.article :article="$article" class="mb-3" />
                @endforeach
            </div>

            <div class="col-lg-3">
                <x-products-sidebar :products="$products" />
            </div>

        </div>
    </div>

</x-layouts.agent.master>
