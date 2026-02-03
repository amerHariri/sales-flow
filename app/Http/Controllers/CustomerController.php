<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $archived = $request->boolean('archived'); // true لو archived=1

        $customers = Customer::query()
            ->where('is_active', !$archived)
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('customers.index', compact('customers', 'archived'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = $request->validated();

        Customer::create($customer);

        return back()->with('customerStoreSuccess', 'customer has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $data = $request->validated();

        $customer->update($data);

        return redirect()->route('customers.index')->with('editSuccess', 'The Customer Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer->is_active) {
            $customer->update([
                'is_active' => false,
            ]);

            return redirect()->route('customers.index', ['archived' => false])->with('ArchiveOrActiveSuccess', 'The customer has been archived');
        } else {
            $customer->update([
                'is_active' => true,
            ]);

            return redirect()->route('customers.index', ['archived' => true])->with('ArchiveOrActiveSuccess', 'The customer has been active');
        }
    }
}
