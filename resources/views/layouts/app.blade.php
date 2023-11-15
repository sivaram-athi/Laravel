<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('/img/icom.png') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bod1">
    <div id="app">

        {{-- <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container-fluid">
                <div class="container ms-5 ps-5">
                    <a class="navbar-brand vibrate-1" href="{{ url('/twitter') }}">
                        <i class="fa-brands fa-twitter fa-lg" style="color: #249EF1;"></i>
                        Twitter
                    </a>
                </div>
            </div>
        </nav> --}}
        <main class="py-4">
            <div class="container-fluid">
                @if (!auth()->check())
                    @yield('content')
                @endif
                @if (auth()->check())
                    <div class="row ">
                        <div class="col">
                            @include('_sidebar_links')
                        </div>
                        <div class="col-md-6">
                            @yield('content')
                        </div>

                        <div class="col">
                            @include('_friends-list')
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>

</html>
