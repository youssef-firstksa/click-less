<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Bank;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Product::class);

        $products = Product::whereCanAccessDashboard()
            ->commonFilters([
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
        Gate::authorize('create', Product::class);

        $bankOptions = Bank::whereCanAccessDashboard()->translatedPluck('title');
        return view('dashboard.products.create', compact('bankOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        Gate::authorize('create', Product::class);

        $product = Product::create($request->validated());

        return redirect()->route('dashboard.products.index')->with('success', __('dashboard.messages.success.created', ['resource' => $product->title]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        Gate::authorize('view', $product);
        // return view('dashboard.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);

        $bankOptions = Bank::whereCanAccessDashboard()->translatedPluck('title');

        return view('dashboard.products.edit', compact('product', 'bankOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        Gate::authorize('update', $product);

        $product->update($request->validated());

        return redirect()->route('dashboard.products.index')->with('success', __('dashboard.messages.success.updated', ['resource' => $product->title]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Gate::authorize('delete', $product);

        $product->delete();
        return redirect()->route('dashboard.products.index')->with('success', __('dashboard.messages.success.deleted', ['resource' => $product->title]));
    }

    public function getBankProducts(Request $request)
    {
        if (
            Gate::denies('create-product')
            &&  Gate::denies('update-product')
            &&  Gate::denies('create-section')
            &&  Gate::denies('update-section')
            &&  Gate::denies('create-article')
            &&  Gate::denies('update-article')
        ) abort(403);

        $bankId = $request->get('id');

        if (!$bankId) {
            return response()->json([]);
        }

        $products = Product::where('bank_id', $bankId)
            ->whereActivated()
            ->translatedPluck('title')
            ->toArray();

        $results = [];
        foreach ($products as $id => $title) {
            $results[] = ['id' => $id, 'text' => $title];
        }

        return response()->json($results);
    }
}
