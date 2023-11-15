@extends('amazon.layouts.app')

@section('content')
    <div class=" container p-5  rounded bg-light mx-auto mt-5 mb-5">
        <form action="{{ route('singleOrder', $product->id) }}" method="post">
            @csrf
            <div class="float-end me-2">
                <button type="button" class="btn rounded-4" style="background: #F7CA00" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Place Order
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Almost done</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                are you sure to place the order
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn " style="background: #F7CA00">order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class=" border-bottom pb-3">
                CheckOut Page
            </h3>

            <div>
                <div class="card mb-3 border-0" style=" width : auto;">
                    <div class="row border-bottom id g-0">
                        <div class="col-md-4 text-center p-4">
                            <img src="/storage/{{ $product->product_image }}" height="250px" width="200px"
                                class=" rounded-start" alt="...">
                        </div>
                        <div class="col-md-8" ng-controller="Cart1Controller as Cart1Ctrl">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->product_name }}</h5>
                                <p class="card-text">
                                    <span class="fs-4"><strong>₹{{ $product->product_price }}</strong>
                                    </span>
                                </p>
                                @if ($product->quantity !== 0)
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
                                <div class=" d-flex">
                                    <input type="text" hidden name="product_id" value="{{ $product->id }}">
                                    <input type="text" hidden name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="text" hidden name="product_quantity" value="{{ $product->quantity }}">
                                    <input type="text" hidden name="original_price"
                                        value="{{ $product->product_price }}">
                                    <div class="input-group d-flex  mb-3" style="width: 250px">
                                        @if ($product->quantity >= $product->product_quantity)
                                            <input type="number" max="{{ $product->quantity }}" class="form-control"
                                                min="1" value="1" aria-describedby="basic-addon2" name="qty"
                                                required>
                                        @else
                                            <div class="text-danger mt-2">
                                                <h6 class=" ms-2">Oop's out of stock</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if ($message = Session::get('message'))
            <div class="text-center">
                <h5 class=" text-success">
                    {{ $message }}
                </h5>
            </div>
        @endif
    </div>
@endsection


@section('script')
    <script src="{{ asset('js/cart.js') }}" defer></script>
@endsection
