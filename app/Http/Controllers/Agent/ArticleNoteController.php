<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleNote;
use App\Models\ArticleNoteCategory;
use Illuminate\Http\Request;

class ArticleNoteController extends Controller
{
    public function index()
    {
        $notes = ArticleNote::where('user_id', auth()->id())
            ->where('bank_id', auth()->user()->activeBank()->id)
            ->paginate();

        $noteCategoryOptions = ArticleNoteCategory::translatedPluck('title');

        return view('agent.articles.notes.index', compact('notes', 'noteCategoryOptions'));
    }

    public function create(Article $article)
    {
        $noteCategoryOptions = ArticleNoteCategory::translatedPluck('title');

        return view('agent.articles.notes.create', compact('article', 'noteCategoryOptions'));
    }

    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'article_note_category_id' => ['required', 'exists:article_note_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $validated['user_id'] = auth()->id();
        $validated['bank_id'] = $article->bank_id;

        $article->notes()->create($validated);

        return redirect()->route('agent.articles-notes.index')->with('success', __('dashboard.messages.success.created', ['resource' => $article->title]));
    }

    public function edit(Article $article, ArticleNote $note)
    {
        $noteCategoryOptions = ArticleNoteCategory::translatedPluck('title');

        return view('agent.articles.notes.edit', compact('article', 'note', 'noteCategoryOptions'));
    }

    public function update(Request $request, Article $article, ArticleNote $note)
    {
        $validated = $request->validate([
            'article_note_category_id' => ['required', 'exists:article_note_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $note->update($validated);

        return redirect()->route('agent.articles-notes.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $note->title]));
    }
}
