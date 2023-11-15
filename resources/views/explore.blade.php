@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($users as $user)
            <li class=" list-unstyled border bor rounded p-2 w-75  mb-2">
                <div class="d-flex hove">
                    <a class=" text-decoration-none  text-dark " href="{{ route('twitter_profile', $user) }}">
                        <img src="{{ $user->avatar }}" alt="" class="rounded-circle" style="height: 50px; width:50px;">
                        <span class="mt-2 ml-3 text-light" style="font-size: 20px">{{'@'. $user->name }}</span>
                    </a>
                </div>
            </li>
        @endforeach
        {{ $users->links() }}
    </ul>
@endsection
