@extends('amazon.layouts.app')

@section('content')
    <div class=" container mt-5 " style="margin-left:">
        <div class="row gap-5">
            <div class="col p-5 mb-5 rounded bg-light ">
                <h3 class=" border-bottom pb-3">
                    Your Orders 
                </h3>
                <div>
                    <div class="card mb-3 border-0" style=" width : auto;">
                        @foreach ($orders as $order)
                            <div class="row border-bottom id g-0">
                                <div class="col-md-4 text-center p-4">
                                    <a href="{{ route('current_product', $order->products->id) }}">
                                    <img src="/storage/{{ $order->products->product_image }}" height="200px"
                                        width="150px" class=" rounded-start" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $order->products->product_name }}</h5>
                                        <p class="card-text">
                                            <span
                                                class="fs-4"><strong>₹{{ $order->price }}</strong>
                                            </span>
                                        </p>
                                        <h6>Quantity : {{ $order->qty }}</h6>

                                        <h6 class=" text-success"><i class="fa-solid fa-circle-check" style="color: #198754;"></i> Order Confirmed</h6>
                                        <img src="/img/amazon/fba-badge_18px._CB485936079_.png" alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{ $orders->links() }}
    </div>
@endsection
