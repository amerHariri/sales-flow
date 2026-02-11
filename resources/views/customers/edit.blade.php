@extends('theme.master')
@section('main-title', 'Edit Customer Information')
@section('title', 'Edit Customer Information')

@section('content')

    <form action="{{ route('customers.update', ['customer' => $customer]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class=" input-group mb-3">
            <span class="input-group-text">Product Name</span>
            <input name="name" value="{{ $customer->name }}" type="text" class="form-control" aria-label="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Phone</span>
            <input name="phone" value="{{ $customer->phone }}" type="text" class="form-control" aria-label="phone"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Email</span>
            <input name="email" value="{{ $customer->email }}" type="text" class="form-control" aria-label="email"
                aria-describedby="basic-addon1">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection