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
                $query->orWhereTranslationLike('content', "%{$search}%");
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

    public function toggleLike(Article $article)
    {
        $validated = request()->validate([
            'action' => ['required', 'string', 'in:like,dislike']
        ]);

        $action = $validated['action'];

        // Check if the user has already rated the article
        $existingRate = $article->rates()->where('user_id', auth()->id())->first();

        // Check if there is an existing rate
        if ($existingRate) {
            // If the action is the same as the existing rate, remove it
            if ($existingRate->action === $action) {
                $existingRate->delete();
                return redirect()->back();
            }

            // If the action is different, update it
            $existingRate->update(['action' => $action]);
            return redirect()->back();
        }

        // If there is no existing rate, create a new one
        $article->rates()->create([
            'user_id' => auth()->id(),
            'action' => $action
        ]);

        return redirect()->back();
    }
}
