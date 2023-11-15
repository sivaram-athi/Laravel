@extends('amazon.admin.adminNav')

@section('content')
    @include('amazon.admin.nav')
    <div class=" p-5 container rounded mt-5" style="background: #F08804">
        <form action="{{ route('update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group text-center mb-3">
                <div class="">
                    <img src="{{ asset("/storage/$product->product_image") }}" class="ima rounded" alt="Your avatar"
                        style="width: 250px;height:250px;">
                </div>
            </div>
            <label for="exampleInputEmail1" class="form-label">Product_category</label>
            <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product_name</label>
                <input type="text" class="form-control" value="{{ $product->product_name }}" name="product_name"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">product_description</label>
                <input type="text" class="form-control" value="{{ $product->product_description }}"
                    name="product_description" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">product_image</label>
                <input id="avatar" type="file" class="form-control" name="product_image" autocomplete="avatar"
                    autofocus required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="text" class="form-control" value="{{ $product->product_price }}" name="product_price"
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">quantity</label>
                <input type="text" class="form-control" value="{{ $product->quantity }}" name="quantity"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group d-flex mb-0">
                <div class="me-3">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
                <div class="">
                    <a href="{{ route('list') }}" type="submit" class="btn btn-danger">
                        cancel
                    </a>
                </div>
            </div>
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <ul>
                        <li class="list-unstyled">
                            <h5 class=" text-danger">
                                {{ $error }}
                            </h5>
                        </li>
                    </ul>
                @endforeach
            @endif
        </form>
        @if ($message = Session::get('success'))
            <div class="text-center">
                <h5 class=" text-success">
                    {{ $message }}
                </h5>
            </div>
        @endif
    </div>
@endsection
