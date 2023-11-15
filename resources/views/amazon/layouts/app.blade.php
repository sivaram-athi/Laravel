<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/img/icon.jfif') }}">
    <title>amazon.in</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link href="{{ asset('/css/amazon/amazon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body ng-app="myApp">
    <nav class="navbar navi navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="row w-100 d-flex justify-content-between">
                <div class="col-md-1 hov">
                    <a class="navbar-brand" href="{{ url('amazon') }}"><img src="{{ asset('/img/amazon/Capture.PNG') }}"
                            width="100px" alt=""></a>
                </div>
                <div class="col-md-2 w-auto hid hov">
                    <a href="">
                        <span class="ms-4 text-secondary" style="color: #cccccc">Hello</span>
                        <div>
                            <i class="fa-solid fa-location-dot text-light"></i>
                            <span class="ms-2 text-light"><strong>Select your address</strong></span>
                        </div>
                    </a>
                </div>
                <div class="col-md-5">
                    <div>
                        <form class="d-flex" role="search" action="{{ route('category') }}" method="GET">
                            <div class="input-group">
                                <select name="category" class="dropdown input-group-text"
                                    aria-label="Default select example">
                                    <option value="All" selected>All</option>
                                    @foreach ($categories as $category)
                                        @if ($category->id == session()->get('category'))
                                            <option class="opt" name="select" selected value="{{ $category->id }}">
                                                {{ $category->category_name }}</option>
                                        @else
                                            <option class="opt" name="select" value="{{ $category->id }}">
                                                {{ $category->category_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                </ul>
                                <input type="text" name="product" class="form-control"
                                    value="{{ Session::get('search') }}" aria-label="Amount (to the nearest dollar)">
                                <button class="btn input-group-text" type="submit" style="background: #FEBD69">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="hov col-md-1 hid w-auto mt-2">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/img/amazon/flag.png" width="30px" alt="">EN
                    </a>
                </div>
                <div class="col-md-1 hov ">
                    <div class="dropdown">
                        <div data-bs-toggle="dropdown">
                            <div class="text-light" type="button">
                                @if (Auth::user())
                                    hello {{ Auth::user()->username }}
                                @else
                                    sign in
                                @endif
                            </div>
                            <div class="dropdown-toggle text-light" type="button" aria-expanded="false">
                                <strong>
                                    Account
                                </strong>
                            </div>
                        </div>
                        <ul class="dropdown-menu menu text-center">
                            @if (Auth::user())
                                <li>
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <button class="btn  text-dark " style="background: #FFD814"> Logout</button>
                                    </form>
                                <li class="mt-2"> Hello {{ Auth::user()->username }}</li>
                                </li>
                            @else
                                <li><a class="btn" href="{{ route('login') }}" style="background: #FFD814">Sign
                                        in</a></li>
                                <li>New customer? <a class="dem" href="{{ route('register') }}">start here</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-1 hid w-auto hov">
                    @if (auth()->user())
                        <a href="{{ route('orders') }}" class="text-light">
                            <div>
                                Returns
                            </div>
                            <div>
                                <strong>
                                    & Orders
                                </strong>
                            </div>
                        </a>
                    @else
                        <a href="{{ url('/login') }}" class="text-light">
                            <div>
                                Returns
                            </div>
                            <div>
                                <strong>
                                    & Orders
                                </strong>
                            </div>
                        </a>
                    @endif

                </div>
                <div class="col-md-1">
                    <div class="cart-box hov">
                        <a href="{{ route('cartPage') }}" class=" d-flex">
                            @if (Auth::check())
                                @if (Auth::user())
                                    <span class="total-item " id="cart"
                                        style="color: orange">{{ isset($num) ? $num : '' }}</span>
                                @endif
                            @else
                                <span class="total-item " style="color: orange">0</span>
                            @endif
                            <img src="{{ asset('/img/amazon/cart.png') }}">
                            <p class=" text-light">Cart</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <nav class=" navbar  navbar-expand-lg  navo">
        <div class="container-fluid">
            <a class="" href="">All</a>
            <button class="navbar-toggler  bg-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-around w-100">
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a href="{{ route('category_product', $category->id) }}" class="nav-link"
                                aria-current="page" href="#">{{ $category->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')


    @include('amazon.layouts.footer')

    @yield('script')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
