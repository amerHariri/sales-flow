@extends('theme.master')
@section('main-title', 'Create New Product')
@section('title', 'Create New Product')


@section('content')

    <div class="form-responsive">
        @if (session('productStoreSuccess'))
            <div class="alert alert-success">{{ session('productStoreSuccess') }}</div>
        @endif
        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class=" input-group mb-3">
                <span class="input-group-text">Product Name</span>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" aria-label="name"
                    aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Price</span>
                <input name="price" value="{{ old('price') }}" type="text" class="form-control" aria-label="price"
                    aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Stock</span>
                <input name="stock" value="{{ old('stock') }}" type="text" class="form-control" aria-label="stock"
                    aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection