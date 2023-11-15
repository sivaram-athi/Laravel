@extends('amazon.layouts.app')

@section('content')
    <div class=" container mt-5 " style="margin-left:">
        <div class="row gap-5">
            <div>
                <a href="{{ route('cartPage') }}" class="btn rounded-4" style="background: #F7CA00;width:100px">back</a>
            </div>
            <div class="col p-5 mb-5 rounded bg-light ">
                <form action="{{ route('placeOrder') }}" method="post">
                    @csrf
                    <div class="float-end me-2">

                        <button type="button" class="btn rounded-4" style="background: #F7CA00" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Place Order
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn " style="background: #F7CA00">order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <h3 class=" border-bottom pb-3">
                    CheckOut Page
                </h3>
                <div>
                    <div class="card mb-3 border-0" style=" width : auto;">
                        @foreach ($cartItems as $cartItem)
                            <div class="row border-bottom id g-0">
                                <div class="col-md-4 text-center p-4">
                                    <img src="/storage/{{ $cartItem->product->product_image }}" height="200px"
                                        width="150px" class=" rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $cartItem->product->product_name }}</h5>
                                        <p class="card-text">
                                            <span
                                                class="fs-4"><strong>₹{{ $cartItem->product->product_price * $cartItem->product_quantity }}</strong>
                                            </span>
                                        </p>
                                        <h6>Quantity : {{ $cartItem->product_quantity }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
