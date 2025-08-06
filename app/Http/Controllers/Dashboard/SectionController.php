<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Bank;
use App\Models\Product;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.sections.create', compact('bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $section = Section::create($request->validated());

        return redirect()->route('dashboard.sections.index')->with('success', __('dashboard.messages.success.created', ['resource' => $section->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        // return view('dashboard.sections.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.sections.edit', compact('section', 'bankOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->validated());

        return redirect()->route('dashboard.sections.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $section->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('dashboard.sections.index');
    }
}
