@extends('layouts.app')

@section('content')
    @forelse (auth()->user()->followers as $user)
        <li class=" list-unstyled border bor rounded p-2 w-75  mb-2">
            <div class="d-flex justify-content-between hove">
                <div>
                    <a class=" text-decoration-none  text-dark " href="{{ route('message', $user) }}">
                        <img src="{{ $user->avatar }}" alt="" class="rounded-circle" style="height: 50px; width:50px;">
                        <span class="mt-2 ml-3" style="font-size: 20px">{{ $user->name }}</span>
                    </a>
                </div>
                <div class="me-5">
                    <a class="text-decoration-none  text-dark " href="{{ route('message', $user) }}">
                        <button class="btn btn-light">message</button>
                    </a>
                </div>
            </div>
        </li>
    @empty
        <h4 class=" text-light text-center">No friends yet .😢</h4>
    @endforelse
@endsection
