@extends('amazon.admin.adminNav')


@section('content')
    @include('amazon.admin.nav')
    <div class=" p-5 container rounded mt-5" style="background: #F08804">
        <form action="{{ route('updatecategory', $category->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category title</label>
                <input type="text" class="form-control" value="{{ $category->title }}" name="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group d-flex mb-0">
                <div class="me-3">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
                <div class="">
                    <a href="{{ route('CategoryList') }}" type="submit" class="btn btn-danger">
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
        
    </div>

@endsection
