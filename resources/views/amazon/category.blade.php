@extends('amazon.layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            {{-- <div class="col-md-2">
                <h6 class=" ms-4 ps-2"> <strong>Deleiver Day</strong></h6>
                <ul>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Get it tomorrow</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Get it in 2 days</li>
                </ul>
                <h6 class=" ms-4 ps-2"> <strong>Departments</strong></h6>
                <ul>
                    <li class=" list-unstyled">Smartphone & basic mobiles</li>
                    <ul>
                        <li class=" list-unstyled">Smartphones</li>
                        <li class=" list-unstyled">Basic Mobiles</li>
                    </ul>
                    <li class=" list-unstyled home-card"><a href="#" class=" text-decoration-none">See all 12
                            departments</a></li>
                </ul>
                <h6 class="ms-4 ps-2"><strong>Customer Reviews</strong></h6>
                <ul>
                    <li class=" list-unstyled">
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        &up
                    </li>
                    <li class=" list-unstyled">
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        &up
                    </li>
                    <li class=" list-unstyled">
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        &up
                    </li>
                    <li class=" list-unstyled">
                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                        &up
                    </li>
                </ul>
                <h6 class=" ms-4 ps-2"><strong>Brands</strong></h6>
                <ul>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Samsung</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Realme</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Readmi</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Oppo</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Oneplus</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Apple</li>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Vivo</li>
                    <li class=" list-unstyled home-card"><a href="#" class=" text-decoration-none">See more</a></li>
                </ul>
                <h6 class=" ms-4 ps-2"><strong>Price</strong></h6>
                <ul>
                    <li class=" list-unstyled">Under ₹ 1,000</li>
                    <li class=" list-unstyled">₹ 1,000 - ₹ 5,000</li>
                    <li class=" list-unstyled">₹ 5,000 - ₹ 10,000</li>
                    <li class=" list-unstyled">₹ 10,000 - ₹ 20,000</li>
                    <li class=" list-unstyled">over ₹ 20,000</li>
                </ul>
                <h6 class=" ms-4 ps-2"><strong>Deals</strong></h6>
                <ul>
                    <li class=" list-unstyled"><input type="checkbox" name="" id=""> Today Deal's</li>
                </ul>
            </div> --}}
            <div class="col-md-10">
                @forelse ($products as $product)
                    <div class="card mb-3 p-5">
                        <div class="row g-0">
                            <div class="col-md-2 p-3">
                                <a href="{{ route('current_product', $product->id) }}">
                                    <img class="sear" src="{{ asset("/storage/$product->product_image") }}"
                                        class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <h5 class="card-title ">
                                        <a href="{{ route('current_product', $product->id) }}" class="ss">
                                            {{ $product->product_name }}
                                        </a>
                                    </h5>
                                    <li class="home-card list-unstyled">
                                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                                        <i class="fa-solid fa-star" style="color: #FFA41C;"></i>
                                        <i class="fa-regular fa-star" style="color: #FFA41C;"></i>
                                        <a class="" href="">2,555</a>
                                    </li>
                                    <p class="card-text"><small class="text-body-secondary">5K+ bought in past
                                            month</small>
                                    </p>
                                    <h5>
                                        <span class="fs-4"><strong>₹{{ $product->product_price }}</strong>
                                        </span>
                                    </h5>
                                    <p class="card-text"><small class="text-body-secondary">Buy for
                                            ₹{{ $product->product_price }} with ICICI
                                            Bank credit card</small> </p>
                                    <a href="" class="ang" style="color: #137B8E">+1 colors/patterns</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-10 mb-5">
                        <div class="card p-5" style="width: 1500px;">
                            <h5 class="card-header">Oop's</h5>
                            <div class="card-body">
                                <h5 class="card-title">No result for {{ $message }} </h5>
                                <p class="card-text">Try checking Your spelling or use more general terms.
                                </p>
                                {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            {{ $products->links() }}
        </div>

    </div>
@endsection
