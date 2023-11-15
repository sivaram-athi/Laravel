@extends('amazon.layouts.app')

@section('content')
    <div class=" m-5 p-5">
        <div class="text-center m-5 p-5">
            <h5 class=" text-success">Purchase Successfull</h5>
            <h1 class=" mb-3">Thanks for choosing <b>Amazon</b></h1>
            <a href="{{ route('orders') }}" class="btn btn-light">Your Orders</a>
            <a href="/amazon" class=" btn btn-warning ms-3">Continue Shopping</a>
        </div>
    </div>
@endsection
