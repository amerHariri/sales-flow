@extends('theme.master')

@section('title', 'Products List')


@section('archive_btn')
    <a href="{{ route('products.index', ['archived' => $archived ? 0 : 1]) }}" class="btn btn-sm btn-outline-secondary">
        {{ $archived ? 'Show Active' : 'Show Archived' }}
    </a>
@endsection

@section('content')

    @if (session('editSuccess'))
        <div class="alert alert-success">{{ session('editSuccess') }}</div>
    @endif

    @if (session('ArchiveOrActiveSuccess'))
        <div class="alert alert-success">{{ session('ArchiveOrActiveSuccess') }}</div>
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
                                <button type="submit"
                                    class="btn btn-sm {{ $product->is_active ? "btn-warning" : "btn-success" }}  mr-2"
                                    onclick="return confirm('Are you sure you want to {{ $product->is_active ? 'archive' : 'active' }} this product?')">{{ $product->is_active ? "Archive" : "Active" }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    {{ $products->render('pagination::bootstrap-5') }}
@endsection