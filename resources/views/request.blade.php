@extends('layouts.app')

@section('content')
    <ul>
        @forelse (auth()->user()->requests as $user)
            <li class=" list-unstyled border bor rounded p-2 w-75  mb-2">
                <div class="d-flex hove">
                    <a class=" text-decoration-none  text-dark " href="{{ route('twitter_profile',$user) }}">
                        <img src="{{ $user->avatar }}" alt="" class="rounded-circle" style="height: 50px; width:50px;">
                        <span class="mt-2 ml-3" style="font-size: 20px">{{ $user->name }}</span>
                    </a>
                    <form action="{{ route('twitter_accept',$user->id) }}" method="POST" class="ms-5">
                        @csrf
                        @method('PUT')
                        <button type="submit" class=" btn btn-success shadow rounded-pill">{{ auth()->user()->following($user)?'accept':'' }}</button>
                    </form>
                    <form action="{{ route('twitter_decline',$user->id) }}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-danger shadow rounded-pill">Decline</button>
                    </form>
                </div>
            </li>
            @empty
            <h4 class=" text-light text-center">No Notification. 😃</h4>
        @endforelse
    </ul>
@endsection
