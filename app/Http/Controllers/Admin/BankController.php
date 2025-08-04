<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banks = Bank::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('admin.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBankRequest $request)
    {
        $bank = Bank::create($request->validated());

        if ($request->hasFile('image')) {
            $bank->addMediaFromRequest('image')->toMediaCollection('image', 'media');
        }

        if ($request->hasFile('logo')) {
            $bank->addMediaFromRequest('logo')->toMediaCollection('logo', 'media');
        }

        return redirect()->route('admin.banks.index')->with('success', __('admin.messages.success.created', ['resource' => $bank->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Bank $bank)
    {
        // return view('admin.banks.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('admin.banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());
        return redirect()->route('admin.banks.index')->with('success', __('admin.messages.success.updated', ['resource' => $bank->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('admin.banks.index');
    }
}
