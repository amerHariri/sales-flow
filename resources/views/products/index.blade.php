@extends('theme.master')

@section('title', 'Products List')

@section('content')

    @if (session('editSuccess'))
        <div class="alert alert-success">{{ session('editSuccess') }}</div>
    @endif

    @if (session('deleteSuccess'))
        <div class="alert alert-success">{{ session('deleteSuccess') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($products) > 0)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td style="display: flex;" width="20%">
                            <a href="{{ route('products.edit', ['product' => $product]) }}"
                                class="btn btn-sm btn-primary mr-2">Edite</a>
                            <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger mr-2"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    {{ $products->render('pagination::bootstrap-5') }}
@endsection