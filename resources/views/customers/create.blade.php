@extends('theme.master')
@section('main-title', 'Create New Customer')
@section('title', 'Create New Customer')


@section('content')
    <div class="form-responsive">


        @if (session('customerStoreSuccess'))
            <div class="alert alert-success">{{ session('customerStoreSuccess') }}</div>
        @endif
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class=" input-group mb-3">
                <span class="input-group-text">Customer Name</span>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" aria-label="name"
                    aria-describedby="basic-addon1">
            </div>

            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="input-group mb-3">
                <span class="input-group-text">Phone</span>
                <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" aria-label="phone"
                    aria-describedby="basic-addon1">
            </div>

            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="input-group mb-3">
                <span class="input-group-text">Email</span>
                <input name="email" value="{{ old('email') }}" type="text" class="form-control" aria-label="email"
                    aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection