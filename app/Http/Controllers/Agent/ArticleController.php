<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select('id', 'section_id', 'published_at', 'created_at')
            ->whereCanAccess()
            ->when(request()->get('search'), function ($query, $search) {
                $query->whereTranslationLike('title', "%{$search}%");
                $query->whereTranslationLike('content', "%{$search}%");
            })
            ->when(request()->get('section_id'), function ($query, $sectionId) {
                $query->whereHas('section', fn($q) => $q->where('id', $sectionId));
            })
            ->latest()
            ->paginate();

        $products = Product::whereCanAccess()->withWhereHas('sections')->get();

        return view('agent.articles.index', compact('articles', 'products'));
    }

    public function show(Article $article)
    {
        if ($article->bank_id !== auth()->user()->activeBank()->id) abort(403);

        $products = Product::whereCanAccess()->withWhereHas('sections')->get();

        return view('agent.articles.show', compact('article', 'products'));
    }
}
