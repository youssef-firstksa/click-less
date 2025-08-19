<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleNoteController extends Controller
{
    public function create(Article $article)
    {
        return view('agent.articles.notes.create', compact('article'));
    }

    public function store(Request $request, Article $article)
    {
        $article->notes()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('agent.articles.notes.index', $article);
    }
}
