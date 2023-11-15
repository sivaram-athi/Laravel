@extends('amazon.admin.adminNav')


@section('content')
    <div ng-controller= "AdminController as adminCtrl">
        @include('amazon.admin.nav')
        <div class=" p-5 container rounded mt-3"style="background: #F08804; width:800px">
            @forelse ($categories as $category)
                <div class="card mb-3" style="max-width: auto;">
                    <div class="row g-0 ">
                        <div class="col-md-10 ">
                            <div class="card-body d-flex justify-content-between">
                                <h5 class="card-title  ss">{{ $category->category_name }}</h5>
                                <div class=" d-flex">
                                    {{-- <div class="me-5">
                                        <a href="{{ route('categoryedit', $category->id) }}" class=" btn btn-info">Edit</a>
                                    </div> --}}
                                    <div>
                                        <button class=" btn btn-danger"
                                            ng-click="adminCtrl.categorydelete({{ $category->id }},$event)">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h4>
                    please add a category first
                </h4>
            @endforelse
            {{ $categories->links() }}
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endsection
