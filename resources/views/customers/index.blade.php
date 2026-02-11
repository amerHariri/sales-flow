@extends('theme.master')
@section('main-title', 'Customers List')
@section('title', 'Customers List')

@section('archive_btn')
    <a href="{{ route('customers.index', ['archived' => $archived ? 0 : 1]) }}" class="btn btn-sm btn-outline-secondary">
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
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($customers) > 0)
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td style="display: flex;" width="20%">
                            <a href="{{ route('customers.edit', ['customer' => $customer]) }}"
                                class="btn btn-sm btn-primary mr-2">Edite</a>
                            <form action="{{ route('customers.destroy', ['customer' => $customer]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-warning mr-2"
                                    onclick="return confirm('Are you sure you want to {{ $customer->is_active ? 'archive' : 'active' }} this customer?')">Archive</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
    {{ $customers->render('pagination::bootstrap-5') }}
@endsection