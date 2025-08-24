<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleNoteCategoryRequest;
use App\Http\Requests\UpdateArticleNoteCategoryRequest;
use App\Models\ArticleNoteCategory;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleNoteCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', ArticleNoteCategory::class);

        $articleNoteCategories = ArticleNoteCategory::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.article-note-categories.index', compact('articleNoteCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', ArticleNoteCategory::class);

        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.article-note-categories.create', compact('bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleNoteCategoryRequest $request)
    {
        Gate::authorize('create', ArticleNoteCategory::class);

        $articleNoteCategory = ArticleNoteCategory::create($request->validated());

        return redirect()->route('dashboard.article-note-categories.index')->with('success', __('dashboard.messages.success.created', ['resource' => $articleNoteCategory->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleNoteCategory $articleNoteCategory)
    {
        Gate::authorize('view', $articleNoteCategory);

        // return view('dashboard.article-note-categories.show', compact('articleNoteCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleNoteCategory $articleNoteCategory)
    {
        Gate::authorize('update', $articleNoteCategory);

        $bankOptions = Bank::whereActivated()->translatedPluck('title');

        return view('dashboard.article-note-categories.edit', compact('articleNoteCategory', 'bankOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleNoteCategoryRequest $request, ArticleNoteCategory $articleNoteCategory)
    {
        Gate::authorize('update', $articleNoteCategory);

        $articleNoteCategory->update($request->validated());

        return redirect()->route('dashboard.article-note-categories.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $articleNoteCategory->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleNoteCategory $articleNoteCategory)
    {
        Gate::authorize('delete', $articleNoteCategory);

        $articleNoteCategory->delete();
        return redirect()->route('dashboard.article-note-categories.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $articleNoteCategory->title]));
    }
}
