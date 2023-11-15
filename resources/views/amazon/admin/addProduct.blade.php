@extends('amazon.admin.adminNav')


@section('content')
    @include('amazon.admin.nav')
    @if ($all->id > 0)
        <div class=" p-5 container mb-5 rounded mt-5" style="background: #F08804">
            <form action="{{ route('newProduct') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <label for="exampleInputEmail1" class="form-label">Product_category</label>
                <select name="category_id" class="form-select mb-3" aria-label="Default select example">
                    <option>Open this select menu</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Product_name</label>
                    <input type="text" class="form-control" name="product_name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">product_description</label>
                    <input type="text" class="form-control" name="product_description" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">product_image</label>
                    <input id="avatar" type="file" class="form-control" name="product_image" autocomplete="avatar"
                        autofocus>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Price</label>
                    <input type="text" class="form-control" name="product_price" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">quantity</label>
                    <input type="text" class="form-control" name="quantity" aria-describedby="emailHelp">
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-danger">
                            Upload
                        </button>
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
    @else
    <div class=" p-5 container mb-5 rounded mt-5" style="background: #F08804">
        <h4>
            please add a category first
        </h4>
    </div>
    @endif

@endsection
