@extends('amazon.layouts.app')

@section('content')
    <div class=" container-fluid mt-5 ps-5" style="margin-left:">
        <div class="row gap-5">
            <div>
                <a href="{{ url('/amazon') }}" class="btn rounded-4" style="background: #f70c00;width:150px">back</a>
            </div>
            <div class="col-md-8 p-5 mb-5 rounded bg-light ">

                <h3 class=" border-bottom pb-3">
                    Shopping Cart
                </h3>
                <div>
                    <div class="card mb-3 border-0" style=" width : auto;">
                        @foreach ($carts as $cart)
                            <div class="row border-bottom id g-0">
                                <div class="col-md-4 text-center p-4">
                                    <a href="{{ route('current_product', $cart->product_id) }}">
                                        <img src="/storage/{{ $cart->product_image }}" height="250px" width="200px"
                                            class=" rounded-start" alt="...">
                                    </a>
                                </div>
                                <div class="col-md-8" ng-controller="Cart1Controller as Cart1Ctrl">
                                    <div class="card-body">
                                        <a href="{{ route('current_product', $cart->product_id) }}" class="ang1">
                                            <h5 class="card-title">{{ $cart->product_name }}</h5>
                                        </a>
                                        <p class="card-text">
                                            <span class="fs-4"><strong>₹{{ $cart->product_price }}</strong>
                                            </span>
                                        </p>
                                        @if ($cart->quantity !== 0)
                                            <p class="card-text text-success">
                                                in stock
                                            </p>
                                        @else
                                            <p class="card-text text-danger">
                                                out of stock
                                            </p>
                                        @endif
                                        <p class="card-text">
                                            Eligible for FREE Shipping
                                        </p>
                                        <img src="/img/amazon/fba-badge_18px._CB485936079_.png" alt="">
                                        <div class=" d-flex mt-3">
                                            <input type="checkbox" class="me-1">
                                            this will be a gift
                                            <a href="" class="ang ms-2">Learn more</a>
                                        </div>
                                        <p>
                                            <strong>
                                                Color :
                                            </strong> All color available
                                        </p>
                                        <div class=" d-flex" ng-init="Cart1Ctrl.quans={{ $cart->product_quantity }}">
                                            <div class="input-group d-flex  mb-3" style="width: 250px">
                                                @if ($cart->quantity >= $cart->product_quantity)
                                                    <input type="number" class="form-control" ng-click="Cart1Ctrl.click()"
                                                        ng-model ="Cart1Ctrl.quans" aria-label="Recipient's username"
                                                        min="1" aria-describedby="basic-addon2">
                                                    <button ng-hide="Cart1Ctrl.add"
                                                        ng-click=" Cart1Ctrl.click1( {{ $cart->product_id }},Cart1Ctrl.quans)"
                                                        class="input-group-text" id="basic-addon2">+</button>
                                                @else
                                                    <div class="text-danger mt-2">
                                                        <h6 class=" ms-2">Oop's out of stock</h6>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class=" ms-2">
                                                <button ng-click=" Cart1Ctrl.click2( {{ $cart->product_id }},$event)"
                                                    class="input-group-text" id="basic-addon2"
                                                    class="ang">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class=" float-end" ng-controller="Cart1Controller as Cart1Ctrl">
                        <p class=" fs-3">
                            Subtotal: ₹<strong id="num"></strong>
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-md-3" ng-controller="Cart1Controller as Cart1Ctrl">
                <div class="card bg-light " style="width: auto;">
                    <div class="card-body p-5">
                        <div class=" d-flex">                           
                            <p class="card-title text-success ms-2">
                                <i class="fa-solid fa-circle-check" style="color: #198754;"></i>
                                Your order is eligible for FREE Delivery.
                            </p>
                        </div>
                        <p class="card-subtitle mb-2 mt-2 text-body-secondary">Subtotal : ₹<span id="num1"></span></p>
                        <div class="mt-3 ms-2 me-2">
                            <a href="{{ route('buy') }}" class="btn rounded-4 pt-4 w-100"
                                style="background: #F7CA00 ;height:70px">
                                <h6>
                                    buy now
                                </h6>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
