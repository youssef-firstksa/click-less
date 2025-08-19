<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ArticleNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-article-note');

        $notes = ArticleNote::commonFilters([
            'search' => ['title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.article-notes.index', compact('notes'));
    }
}
