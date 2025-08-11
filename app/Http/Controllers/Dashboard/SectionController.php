<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Bank;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-section');

        $sections = Section::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-section');

        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.sections.create', compact('bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        Gate::authorize('create-section');

        $section = Section::create($request->validated());

        return redirect()->route('dashboard.sections.index')->with('success', __('dashboard.messages.success.created', ['resource' => $section->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        Gate::authorize('show-section');
        // return view('dashboard.sections.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        Gate::authorize('update-section');

        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        $productOptions = Product::where('bank_id', $section->bank_id)->whereActivated()->translatedPluck('title');

        return view('dashboard.sections.edit', compact('section', 'bankOptions', 'productOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        Gate::authorize('update-section');

        $section->update($request->validated());

        return redirect()->route('dashboard.sections.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $section->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        Gate::authorize('delete-section');

        $section->delete();
        return redirect()->route('dashboard.sections.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $section->title]));
    }

    public function getProductSections(Request $request)
    {
        if (Gate::denies('update-section') ||  Gate::denies('store-section')) abort(403);

        $productId = $request->get('id');

        if (!$productId) {
            return response()->json([]);
        }

        $sections = Section::where('product_id', $productId)
            ->whereActivated()
            ->translatedPluck('title')
            ->toArray();

        $results = [];
        foreach ($sections as $id => $title) {
            $results[] = ['id' => $id, 'text' => $title];
        }

        return response()->json($results);
    }
}
