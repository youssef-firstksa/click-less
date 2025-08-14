@props(['section'])

<div {{ $attributes->class(['card section-card']) }}>
    <div class="card-body">
        <h2 class="card-title">

            <a href="{{ route('agent.articles.index', ['section_id' => $section->id]) }}">
                {{ $section->title }}
            </a>

        </h2>

        <ul class="section-card-list">
            @foreach ($section->articles as $article)
                <li class="section-card-item">
                    <a href="{{ route('agent.articles.show', $article) }}" class="article-title">
                        {{ $article->title }}
                    </a>
                </li>
            @endforeach
        </ul>

        <div class="view-all-container d-flex align-items-center justify-content-between">
            <a class="view-all-link" href="{{ route('agent.articles.index', ['section_id' => $section->id]) }}">
                أستعراض الكل
            </a>

            <span class="view-all-count">{{ $section->articles_count }}</span>
        </div>
    </div>
</div>
