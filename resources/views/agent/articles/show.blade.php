<x-layouts.agent.master>

    <x-slot name="title">
        {{ $article->title }}
    </x-slot>

    <div class="article-page">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="article-header">
                                <h1 class="article-title">{{ $article->title }}</h1>

                                <div class="article-details">
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="d-flex align-items-center gap-1">
                                            <span>اخر تحديث</span>
                                            <span> {{ $article->updatedAt() }}</span>
                                        </div>

                                        <div class="d-flex align-items-center gap-1">
                                            <span>عبر</span>
                                            <span>{{ $article->author->name }}</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center gap-2">
                                        <span class="bookmark-button">
                                            <iconify-icon icon="solar:bookmark-outline"></iconify-icon>
                                        </span>

                                        <span class="views-count d-flex align-items-center gap-1">
                                            <span class="icon">
                                                <iconify-icon icon="solar:eye-linear"></iconify-icon>
                                            </span>
                                            <span>7892</span>
                                        </span>

                                        <div class="d-flex align-items-center gap-1">
                                            <span>تاريخ الإنشاء</span>
                                            <span>{{ $article->publishedAt() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="article-content">
                                <x-html-content>
                                    {!! $article->content !!}
                                </x-html-content>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <x-products-sidebar :products="$products" />
                </div>

            </div>
        </div>
    </div>

</x-layouts.agent.master>
