@extends('layouts.app')

@section('content')
    <div class=" border rounded bg-secondary gg" style="height:700px;">
        <div class="p-4 rounded-top" style="background:#6eb9f2">
            <a class=" text-decoration-none  text-dark" href="{{ route('twitter_profile', $user) }}">
                <img src="{{ $user->avatar }}" alt="" class="rounded-circle" style="height: 50px; width:50px;">
                <span class="mt-2 ml-3" style="font-size: 20px">{{ $user->name }}</span>
            </a>
        </div>
        <div style="overflow-y:scroll;height:500px;">
            @forelse ($messages as $message)
                @if ($message->user_id == auth()->user()->id)
                    <div class=" d-flex  justify-content-end m-3 ">
                        <div class="bg-info rounded w-50 p-3 float-end">
                            <div>
                                {{ $message->msg }}
                            </div> 
                        </div>
                    </div>
                @endif
                @if ($message->user_id !== auth()->user()->id)
                    <div class=" rounded bg-light m-3 p-3 w-50">
                        {{ $message->msg }}
                    </div>
                @endif
            @empty
               <div class=" text-center mt-5">
                <h5>
                    start Your conversation!
                </h5>
               </div>
            @endforelse
        </div>
        <div class="sss p-2">
            <form action="{{ route('twitter_msg', $user->id) }}" method="POST">
                @csrf
                <div class="ss">
                    <input placeholder="What's Up ?" type="text" name="msg" class="a form-control" required>
                    <button class="bg-transparent s" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
@endsection

