<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Bank;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::commonFilters([
            'search' => ['translation.title'],
            'status' => 'status',
        ])->commonPaginate();

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.products.create', compact('bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return redirect()->route('dashboard.products.index')->with('success', __('dashboard.messages.success.created', ['resource' => $product->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // return view('dashboard.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $bankOptions = Bank::whereActivated()->translatedPluck('title');
        return view('dashboard.products.edit', compact('product', 'bankOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('dashboard.products.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $product->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('dashboard.products.index');
    }
}
