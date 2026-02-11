@extends('theme.master')
@section('main-title', 'Edit Sale')
@section('title', 'Edit Sale Information')


@section('content')


    @if (session('updateSaleSuccess'))
        <div class="alert alert-success">{{ session('updateSaleSuccess') }}</div>
    @endif

    <form action="{{ route('sales.update', ['sale' => $sale]) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="display:flex;gap:2%" class=" input-group mb-3">
            <select style="width:48%" name="product_id" id="productSelect" class="form-select"
                aria-label="Default select example">
                <option value="">Select Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $sale->product_id == $product->id ? 'selected' : '' }}
                        data-price="{{ $product->price }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>

            <select style="width:48%" name="customer_id" id="customerSelect">
                <option value="">Select Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $sale->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>

        </div>


        <div class=" input-group mb-3">
            <span class="input-group-text">Unit Price</span>
            <input name="unit_price" id="unit_price" type="text" class="form-control" aria-label="name"
                aria-describedby="basic-addon1" readonly>
        </div>


        <div class=" input-group mb-3">
            <span class="input-group-text">Quantity</span>
            <input name="quantity" id="quantity" value="{{ $sale->quantity }}" type="text" class="form-control"
                aria-label="quantity" aria-describedby="basic-addon1">
        </div>


        <div class=" input-group mb-3">
            <span class="input-group-text">Total Amount</span>
            <input name="total_amount" id="total_amount" type="text" class="form-control" aria-label="total_amount"
                aria-describedby="basic-addon1" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <div style="padding: 15px;">
        @error('product_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        @error('customer_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        @error('quantity')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    @include('sales.partials.create-scripts')

@endsection