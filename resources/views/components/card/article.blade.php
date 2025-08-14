@props(['article'])

<div {{ $attributes->class(['card article-card']) }}>
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="card-title">
                {{-- تطبيق STC Bank --}}
                <a href="{{ route('agent.articles.show', $article) }}">
                    {{ $article->title }}
                </a>
            </h4>

            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-1">
                    <iconify-icon icon="solar:clock-circle-linear"></iconify-icon>

                    {{ $article->publishedAt() }}
                </div>

                <div class="d-flex align-items-center gap-1">
                    <iconify-icon icon="solar:eye-linear"></iconify-icon>
                    <span>7892</span>
                </div>
            </div>
        </div>

        <p class="m-0">
            {{-- على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض
            العبارات الفكاهية إليها. --}}

            {{ $article->shortContent }}
        </p>
    </div>
</div>
