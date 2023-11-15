<div class="  shadow-lg  rounded p-3 one" >
    <form method="POST" action="/twitter/tweets">
        @csrf
        <textarea placeholder="What's Up ?" name="body" class=" w-100 form-control" required></textarea>
        <hr class="my-4">
        <div class="d-flex justify-content-between">
            <img src="{{ auth()->user()->avatar }}" alt="" class="rounded-circle"
                style="height: 50px; width:50px">
            <button class=" btn px-5 shadow rounded-pill" type="submit" style="background: #6eb9f2">tweet</button>
        </div>
    </form>

    <div class="mt-2">
        @error('body')
            <p class=" text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>
