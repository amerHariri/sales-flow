<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $archived = $request->boolean('archived'); // true لو archived=1

        $products = Product::query()
            ->where('is_active', !$archived)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('products.index', compact('products', 'archived'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = $request->validated();

        Product::create($product);

        return back()->with('productStoreSuccess', 'New Product Has Been Stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        abort_unless($product->is_active, 403);

        $data = $request->validated();

        $product->update($data);

        return redirect()->route('products.index')->with('editSuccess', 'The Product Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        if ($product->is_active) {
            $product->update([
                'is_active' => false,
            ]);

            return redirect()->route('products.index', ['archived' => false])->with('ArchiveOrActiveSuccess', 'The Product has been archived');
        } else {
            $product->update([
                'is_active' => true,
            ]);

            return redirect()->route('products.index', ['archived' => true])->with('ArchiveOrActiveSuccess', 'The Product has been active');
        }
    }
}
