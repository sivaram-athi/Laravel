<div class=" pt-3 pb-2 rounded-lg" style="background: #6eb9f2">
    <h3 class=" ml-5 font-weight-bold h1">Following</h3>

    <ul>
        @forelse (auth()->user()->followers as $user)
            <li class=" list-unstyled w-75 hov mb-4">
                <div class="d-flex ">
                    <a class=" text-decoration-none  text-dark " href="{{ route('twitter_profile',$user) }}">
                        <img src="{{ $user->avatar }}" alt="" class="rounded-circle" style="height: 50px; width:50px;">
                        <span class="mt-2 ml-3" style="font-size: 20px">{{ $user->name }}</span>
                    </a>
                </div>
            </li>
            @empty
            <h6 class="ms-4">No friends yet!.</h6>
        @endforelse
    </ul>
</div>
