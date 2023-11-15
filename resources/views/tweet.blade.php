<div class=" border bor mb-2 rounded bg-light">
    <div class="row p-3">
        <div class="col-md-2">
            <a href="{{ $tweet->user->path() }}">
                <img src="{{ auth()->user()->avatar }}" alt="" class="rounded-circle"
                    style="height: 60px; width:50px">
            </a>
        </div>
        <div class="col-md-10">
            <a class=" text-decoration-none" href="{{ $tweet->user->path() }}" style="color: #249EF1">
                <h4 class="font-weight-bold">{{ $tweet->user->name }}</h4>
            </a>
            <p>
                {{ $tweet->body }}
            </p>
            <div class=" d-flex">
                <form action="/twitter/tweets/{{ $tweet->id }}/like" method="POST">
                    @csrf
                    <div class=" d-flex align-items-center me-2 ">
                        <button type="submit" class=" btn {{ $tweet->isLikedBy(auth()->user()) ? 'colone' : 'text-secondary' }}">
                        <i class="fa-regular fa-thumbs-up "></i>
                        {{ $tweet->likes ?: 0 }}</button>
                    </div>
                </form>
                <form action="/twitter/tweets/{{ $tweet->id }}/like" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <div class=" d-flex align-items-center ">
                        <button type="submit" class=" btn {{ $tweet->isDislikedBy(auth()->user()) ? 'coltwo' : 'text-secondary' }}">
                        <i class="fa-regular fa-thumbs-down "></i>
                        {{ $tweet->dislikes ?: 0 }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
