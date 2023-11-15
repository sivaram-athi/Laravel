@extends('amazon.admin.adminNav')


@section('content')
    @include('amazon.admin.nav')

    <div class=" p-5 container mb-5 rounded mt-5" style="background: #F08804">
        <form action="{{ route('newCategory') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="category_name" aria-describedby="emailHelp">
            </div>    
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Category description</label>
                <input type="text" class="form-control" name="title" aria-describedby="emailHelp">
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

@endsection