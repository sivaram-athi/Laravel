@extends('amazon.layouts.app')

@section('content')
    <div class="li " ng-controller="CartController as CartCtrl">
        <div class="row bg-light pt-5 pb-5">
            <div class="mb-4 ps-5">
                <a href="{{ url('/amazon') }}" class="ms-5 ang1 text-l back btn rounded-4"
                    style="background: #f70c00;width:150px">back to result</a>
            </div>
            <div class="col-md-3 text-center">
                <img class=" img-fluid"  src="/storage/{{ $products->product_image }} "
                    alt="">
            </div>
            <div class="col-md-6">
                <h3>{{ $products->product_description }}</h3>
                <a class="ang" href="">vist the one plus store</a>
                <div class="d-flex">
                    <div>
                        <li class=" list-unstyled">
                            <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                            <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                            <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                            <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                            <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                            &up
                        </li>
                    </div>
                    <a class="ang ms-5" href=""> 4,475 ratings</a>
                    <p class="ms-2">|</p>
                    <a href="" class="ang ms-2">759 answered questions</a>
                </div>
                <div>
                    <p>1K+ bought in past month</p>
                    <hr>
                    <p class="text-danger fs-2">-40% <span class="text-dark"><sup>₹</sup>{{ $products->product_price }}.
                            <sup>00</sup> </span></p>
                    <p>Inclusives of all taxes</p>
                    <p><strong>EMI</strong> starts at ₹136 per month.
                        <a class="ang" href="">EMI options <i class="fa-solid fa-chevron-down"></i></a>
                    </p>
                </div>

                <hr>
                <div class="border rounded">
                    <div class="d-flex border-bottom">
                        <img class="p-2" src="/img/amazon/off.PNG" alt="">
                        <span class="text-danger mt-2" style="font-size: 20px">Save extra</span>
                        <p class="mt-2 ms-2 fs-4">
                            with 4 extra offers</p>
                    </div>
                    <div class="pt-2 ps-2 border-bottom d-flex">
                        <p class="ms-2" style="font-size: 20px">
                            <span class="text-danger">No Cost EMI:</span>
                            Avail No Cost EMI on select cards for order above ₹3000 above | <a href=""
                                class="ang"> Details</a>
                        </p>
                    </div>
                    <div class="pt-2 ps-2 pe-1 border-bottom d-flex">
                        <p class="ms-2" style="font-size: 20px ">
                            <span class="text-danger">Bank Offer (5) :</span>
                            Flat INR 2000 instant discount on icici bank credit card transactions. minimum purchase value
                            INR 10000 | <a href="" class="ang">see more</a>
                        </p>
                    </div>
                    <div class="pt-2 ps-3 pb-2">
                        <a href="" class="ang"> <i class="fa-solid fa-chevron-down"></i> see 2 more</a>
                    </div>
                </div>
                <hr>
                <img class="img-fluid" src="/img/amazon/delivery.png" alt="">
                <hr>
            </div>
            <div class="col-md-2 ps-5 p-2">
                <div class="border border-dark rounded">
                    <div class="mt-3 ps-3">
                        <p class="fs-4"><span class="pe-1"><sup>₹</sup></span><strong>{{ $products->product_price }}.
                                <sup>00</sup></strong>
                        </p>
                    </div>
                    <div class="">
                        <a href="" class="ang ms-2 me-2">FREE delivery</a>
                        <p class="ms-2">Friday,10 November . <span><a href="" class="ang ms-2">Details</a></span>
                        </p>
                    </div>

                    <div class="ms-2">
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="" class="ang">Delivery to your location</a>
                    </div>
                    @if ($products->quantity == 0)
                        <div class="text-danger mt-2">
                            <h6 class=" ms-2">Oop's out of stock</h6>
                        </div>
                    @else
                        <div class="text-success mt-2">
                            <h6 class=" ms-2">Only {{ $products->quantity }} left in stock</h6>
                        </div>
                    @endif
                    <div class="ms-2">
                        <p>Sold by <a href="" class="ang">Only-Time</a> and deliverd by amazon</p>
                    </div>
                    @if (!Auth::user())
                        @if ($products->quantity > 0)
                            <div class="ms-2 mb-2 me-2 ">
                                <a class="btn rounded-4 w-100" href="{{ route('login') }}" style="background:      #F7CA00">
                                    add to cart
                                </a>
                            </div>
                        @else
                        @endif
                    @else
                        @if ($products->quantity > 0)
                            <div class="ms-2 mb-2 me-2 ">
                                <button class="btn rounded-4 w-100"
                                    ng-click="CartCtrl.addCart({{ $products }},{{ $user }})"
                                    style="background: #F7CA00">
                                    add to cart
                                </button>
                            </div>
                        @else
                            <div class="ms-2 mb-2 me-2 ">
                                <button class="btn btn-danger rounded-4 w-100">
                                    come back later
                                </button>
                            </div>
                        @endif
                    @endif
                    @if (!Auth::user())
                        @if ($products->quantity > 0)
                            <div class="ms-2 mb-2 me-2 ">
                                <a class="btn rounded-4 w-100" href="{{ route('login') }}" style="background: #FFA41C">buy
                                    now</a>
                            </div>
                        @else
                        @endif
                    @else
                        @if ($products->quantity > 0)
                            <div class="ms-2 mb-2 me-2 ">
                                <a href="{{ route('singleBuy', $products) }}" class="btn rounded-4 w-100"
                                    style="background: #FFA41C">buy now</a>
                            </div>
                        @else
                        @endif
                    @endif
                    <div class="d-flex mb-2">
                        <i class="fa-solid fa-lock mt-1 ms-2"></i>
                        <a href="" class="ang ms-2">Secure transaction</a>
                    </div>
                    <hr class="ms-2 me-2">
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
