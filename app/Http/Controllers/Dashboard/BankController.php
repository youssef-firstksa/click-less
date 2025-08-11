<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('list-bank');

        $banks = Bank::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create-bank');

        return view('dashboard.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankRequest $request)
    {
        Gate::authorize('create-bank');

        $bank = Bank::create($request->validated());

        if ($request->hasFile('image')) {
            $bank->addMediaFromRequest('image')->toMediaCollection('image', 'media');
        }

        if ($request->hasFile('logo')) {
            $bank->addMediaFromRequest('logo')->toMediaCollection('logo', 'media');
        }

        return redirect()->route('dashboard.banks.index')->with('success', __('dashboard.messages.success.created', ['resource' => $bank->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        Gate::authorize('show-bank');
        // return view('dashboard.banks.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        Gate::authorize('update-bank');

        return view('dashboard.banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        Gate::authorize('update-bank');

        $bank->update($request->validated());

        if ($request->hasFile('image')) {
            $bank->addMediaFromRequest('image')->toMediaCollection('image', 'media');
        }

        if ($request->hasFile('logo')) {
            $bank->addMediaFromRequest('logo')->toMediaCollection('logo', 'media');
        }

        return redirect()->route('dashboard.banks.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $bank->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        Gate::authorize('delete-bank');

        $bank->delete();
        return redirect()->route('dashboard.banks.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $bank->title]));
    }
}
