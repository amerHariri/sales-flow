@extends('theme.master')

@section('title', 'Edit Product')

@section('content')


    @if (session('productStoreSuccess'))
        <div class="alert alert-success">{{ session('productStoreSuccess') }}</div>
    @endif
    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=" input-group mb-3">
            <span class="input-group-text">Product Name</span>
            <input name="name" value="{{ $product->name }}" type="text" class="form-control" aria-label="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Price</span>
            <input name="price" value="{{ $product->price }}" type="text" class="form-control" aria-label="price"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Stock</span>
            <input name="stock" value="{{ $product->stock }}" type="text" class="form-control" aria-label="stock"
                aria-describedby="basic-addon1">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection