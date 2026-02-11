<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $archived = $request->boolean('archived'); // true لو archived=1

        $sales = Sale::query()
            ->where('is_active', !$archived)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('sales.index', compact('sales', 'archived'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('is_active', true)->orderBy('name')->get();
        return view('sales.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        $data = $request->validated();
        $product = Product::findOrFail($data['product_id']);
        $data['unit_price'] = $product->price;
        $data['total_amount'] = $data['unit_price'] * $data['quantity'];
        $data['user_id'] = Auth::id();

        Sale::create($data);

        return back()->with('createSaleSuccess', 'The Sale Has Been Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $customers = Customer::where('is_active', true)->orderBy('name')->get();
        $products = Product::where('is_active', true)->orderBy('name')->get();

        return view('sales.edit', compact('sale', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        abort_unless($sale->is_active, 403);
        $data = $request->validated();
        $product = Product::findOrFail($data['product_id']);
        $data['unit_price'] = $product->price;
        $data['total_amount'] = $data['unit_price'] * $data['quantity'];

        $sale->update($data);

        return redirect()->route('sales.index')->with('updateSaleSuccess', 'The Sale Operation has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        if ($sale->is_active) {
            $sale->update([
                'is_active' => false,
            ]);

            return redirect()->route('sales.index', ['archived' => false])->with('ArchiveOrActiveSuccess', 'The Sale Operation has been archived');
        } else {
            $sale->update([
                'is_active' => true,
            ]);

            return redirect()->route('sales.index', ['archived' => true])->with('ArchiveOrActiveSuccess', 'The Sale Operation has been active');
        }
    }
}
