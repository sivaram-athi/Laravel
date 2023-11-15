<div class="  p-4 rounded-lg bg-dark mt-3">
    @forelse ($tweets as $tweet)
        @include('tweet')
    @empty
        <h4 class="p-4 text-light">post your first tweet .😃</h4>
    @endforelse
    {{-- <div class="container"> --}}
        {{ $tweets->links() }}
    {{-- </div> --}}
</div>
