@extends('layouts.app')

@section('content')
    <header class="position-relative">
        <div class="position-relative">

            <img class=" w-100 mb-2 rounded" data-bs-toggle="tooltip" title="cover picture" src="/img/login-bg.png" alt="" style=" height:250px">
            {{-- <div> --}}
            <img class=" mb-2 ima rounded-circle position-absolute" src="{{ $user->avatar }}"
                style=" width:150px;height:150px; left:calc(50% - 75px);top:60%;" data-bs-toggle="tooltip"  title="profile picture">
            {{-- </div> --}}
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3 pt-4 ">
            <div style="max-width: 270px">
                <h2>
                    {{ $user->name }}
                </h2>
                <p>
                    joined {{ $user->created_at->diffForHumans() }}
                </p>
                @can('check',$user)
                <form action="{{ route('message',$user->username) }}" method="POST">
                    @csrf
                    <button class="btn shadow rounded-pill" style="background: #249EF1" type="submit">Message</button>
                </form>
                @endcan
            </div>
            <div class=" d-flex">
                @can ('edit',$user)
                    <a href="{{ $user->path('edit') }}" class="btn-light btn  border border-secondary me-2 rounded-pill">Edit Porfile</a>
                @endif
                @unless (auth()->user()->is($user))
                    <form method="POST" action="{{ Route('twitter_follow',$user->username) }}">
                        @csrf
                        <button type="submit" class=" btn shadow rounded-pill" style="background: #249EF1">
                            {{ auth()->user()->following($user) }}
                        </button>
                    </form>
                @endunless
            </div>
        </div>
        <p class=" text-light">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit, eius. Repellat aliquid sint optio minima,
            laudantium laboriosam eveniet veniam, hic qui aut consectetur facere adipisci reprehenderit nemo, animi sapiente
            impedit?
        </p>

    </header>
    @include('timeline', [
        'tweets' => $tweets,
    ])
@endsection
