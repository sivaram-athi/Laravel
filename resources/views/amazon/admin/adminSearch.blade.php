@extends('amazon.admin.adminNav')


@section('content')
    <div ng-controller= "AdminController as adminCtrl">
        @include('amazon.admin.nav')
        <div class=" p-5 container rounded mt-3"style="background: #F08804">
            @foreach ($products as $product)
                <div class="card border-0 mb-3" style="max-width: auto;">
                    <div class="row g-0">
                        <div class="col-md-2 p-3">
                            <img class="sear" src="{{ asset("/storage/$product->product_image") }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title ss">{{ $product->product_name }}</h5>
                                <p class="card-text"><small class="text-body-secondary">5K+ bought in past month</small>
                                </p>
                                <h5><span class="fs-4"><strong>₹{{ $product->product_price }}</strong></span>
                                </h5>
                                <div class=" d-flex">
                                    <div class="me-5">
                                        <div>
                                            <button class=" btn {{ $product->status == 0 ? 'btn-success' : 'btn-danger' }}"
                                                ng-click="adminCtrl.approve({{ $product->id }},{{ $product->status }},$event)">{{ $product->status == 0 ? 'Approve' : 'DisApprove' }}</button>
                                        </div>
                                    </div>
                                    <div class="me-5">
                                        <a href="{{ route('edit', $product->id) }}" class=" btn btn-info">Edit</a>
                                    </div>
                                    <div class="">
                                        <button class=" btn btn-danger" 
                                            ng-click="adminCtrl.delete({{ $product->id }},$event)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{ $products->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection
