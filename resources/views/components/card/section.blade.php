<div class="card section-card">
    <div class="card-body">
        <h2 class="card-title">{{ $section->title }}</h2>

        <ul class="section-card-list">
            @foreach ($section->articles as $article)
                <li class="section-card-item">
                    <a href="#" class="article-title">{{ $article->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
