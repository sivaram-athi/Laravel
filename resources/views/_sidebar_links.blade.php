<ul class="mx-5 p-5">
    <li class="side list-unstyled  text-center mb-4 ">
        <a class="font-weight-bold text-dark text-decoration-none h3 block" href="{{ route('twitter_home') }}">
            Home
        </a>
    </li>
    <li class="side list-unstyled text-center mb-4 ">
        <a class="font-weight-bold  text-dark text-decoration-none h3 block" href="/twitter/explore">
            Explore
        </a>
    </li>
    <li class="side list-unstyled  text-center mb-4 ">
        <a class="font-weight-bold text-dark text-decoration-none h3 block" href="{{ route('twitter_profile',auth()->user()) }}">
            Profile
        </a>
    </li>
    <li class="side list-unstyled text-center mb-4 ">
        <a class="font-weight-bold  text-dark text-decoration-none h3 block" href="{{ route('request',auth()->user()) }}">
            Notification
        </a>
    </li>
     <li class="side list-unstyled text-center mb-4 ">
        <a class="font-weight-bold  text-dark text-decoration-none h3 block" href="{{ route('chats',auth()->user()) }}">
            Chats
        </a>
    </li>
    <li class="side list-unstyled  text-center  ">
        <form action="/logout" method="POST">
            @csrf
            <button class="btn font-weight-bold text-dark fs-3 p-0"> Logout</button>
        </form>
    </li>
</ul>
