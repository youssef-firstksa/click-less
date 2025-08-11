<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Bank;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-article');

        $articles = Article::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-article');

        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.articles.create', compact('bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        Gate::authorize('create-article');

        $data = [...$request->validated(), 'author_id' => auth()->id()];
        $article = Article::create($data);

        return redirect()->route('dashboard.articles.index')->with('success', __('dashboard.messages.success.created', ['resource' => $article->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        Gate::authorize('show-article');
        // return view('dashboard.articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        Gate::authorize('update-article');

        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        $productOptions = Product::where('bank_id', $article->bank_id)->whereActivated()->translatedPluck('title');
        $sectionOptions = Section::where('product_id', $article->product_id)->whereActivated()->translatedPluck('title');

        return view('dashboard.articles.edit', compact('article', 'bankOptions', 'productOptions', 'sectionOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        Gate::authorize('update-article');

        $article->update($request->validated());

        return redirect()->route('dashboard.articles.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $article->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('update-delete');

        $article->delete();
        return redirect()->route('dashboard.articles.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $article->title]));
    }
}
