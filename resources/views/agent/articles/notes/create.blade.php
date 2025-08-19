<x-layouts.agent.master>

    <x-slot name="title">
        إضافة ملاحظة لمقالة: {{ $article->title }}
    </x-slot>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">إضافة ملاحظة لمقالة: {{ $article->title }}</h5>
                <form action="{{ route('agent.articles.notes.store', $article) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="content" class="form-label">محتوى الملاحظة</label>
                        <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary-600">إضافة ملاحظة</button>
                </form>
            </div>
        </div>
    </div>

</x-layouts.agent.master>