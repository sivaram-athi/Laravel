<div class="shopping-category">
    <div class="rows">
        @foreach ($products as $key => $prod)
            @if ($key == 3)
                <div class="total-ship">
                    <div>
                        <img src="{{ asset('/img/amazon/total-ship.jpg') }}">
                    </div>
                    @if (auth()->user())
                    @else
                        <div class="sign-in-activity">
                            <h3>Sign in for the best experience</h3>
                            <a class="btn" href="{{ url('/login') }}">Sign in securely</a>
                        </div>
                    @endif
                </div>
            @else
                <div class="cols">
                    <h2>{{ $prod->title }}</h2>
                    <div class="gallery-four-image">
                        @foreach ($prod->product as $product)
                            @if ($product->category_id == 3 || $product->category_id == 5 )
                                <div class="gallery-single-image">
                                    <a href="{{ route('category_product', $product->category_id) }}" class="ss">
                                        <img src="{{ asset("/storage/$product->product_image") }}"> 
                                    </a>
                                </div>
                            @break

                        @else
                            <div>
                                <a href="{{ route('category_product', $product->category_id) }}" class="ss">
                                    <img src="{{ asset("/storage/$product->product_image") }} " style = "height:150px">
                                    <p>{{ $product->product_name }}</p>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
                <p class="home-card"><a href="{{ route('category_product', $product->category_id) }}" class="ss">See all deals</a></p>
            </div>
        @endif
    @endforeach
</div>
