<div class="deal-carousel">
    <div class="heading">
        <h3>Trending deals</h3>
        <a href="#">See all deals</a>
    </div>
    <div class="rowss">
        @foreach ($trends as $trend)
            <div class="cols p-4 d-flex flex-column align-items-center">
                <div class="img  ">
                    <a href="{{ route('current_product', $trend->prod->id) }}">
                        <img  src="{{ asset("/storage/".$trend->prod->product_image) }}">
                    </a>
                </div>
                <h2>{{ $trend->prod->product_name }}</h2>
            </div>
        @endforeach
    </div>
</div>
