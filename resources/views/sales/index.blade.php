@extends('theme.master')
@section('main-title', 'Sales List')
@section('title', 'Sales List')

@section('archive_btn')
    <a href="{{ route('sales.index', ['archived' => $archived ? 0 : 1]) }}" class="btn btn-sm btn-outline-secondary">
        {{ $archived ? 'Show Active' : 'Show Archived' }}
    </a>
@endsection

@section('content')


    @if (session('editSuccess'))
        <div class=" alert alert-success">{{ session('editSuccess') }}</div>
    @endif

    @if (session('ArchiveOrActiveSuccess'))
        <div class="alert alert-success">{{ session('ArchiveOrActiveSuccess') }}</div>
    @endif



    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Product Name</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Unit_Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($sales) > 0)
                @foreach ($sales as $sale)
                    <tr>
                        <td>{{ $sale->sold_at }}</td>
                        <td>{{ $sale->product->name }}</td>
                        <td>{{ $sale->customer->name }}</td>
                        <td>{{ $sale->unit_price }}</td>
                        <td>{{ $sale->quantity }}</td>
                        <td>{{ $sale->total_amount }}</td>
                        <td style="display: flex;" width="20%">
                            <a href="{{ route('sales.edit', ['sale' => $sale]) }}" class="btn btn-sm btn-primary mr-2">Edite</a>
                            <form action="{{ route('sales.destroy', ['sale' => $sale]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-warning mr-2"
                                    onclick="return confirm('Are you sure you want to {{ $sale->is_active ? 'archive' : 'active' }} this customer?')">Archive</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    {{ $sales->render('pagination::bootstrap-5') }}
@endsection