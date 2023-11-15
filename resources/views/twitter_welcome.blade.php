<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/img/logo.png">
        <title>Twitter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body class="bod">
        <div class="snowflakes" aria-hidden="true">
        <div class="snowflake">
        ❅
        </div>
        <div class="snowflake">
        ❅
        </div>
        <div class="snowflake">
        ❆
        </div>
        <div class="snowflake">
        ❄
        </div>
        <div class="snowflake">
        ❅
        </div>
        <div class="snowflake">
        ❆
        </div>
        <div class="snowflake">
        ❄
        </div>
        <div class="snowflake">
        ❅
        </div>
        <div class="snowflake">
        ❆
        </div>
        <div class="snowflake">
        ❄
        </div>
      </div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                </div>
            @endif

            <div class="content">
                <div class="title m-b-md  focus-in-contract-bck">
                    <h5 style="color: #fff">
                        Twitter
                        {{-- <img class="ima" src="/img/logo.png" alt="" style="height:70px;"> --}}
                        <i class="fa-brands fa-twitter fa-xs" style="color: #249EF1;"></i>
                    </h5>
                </div>

                <div class="links" >
                     @auth
                        <a href="{{ url('/twitter/tweets') }}" style="color: #fff">Home</a>
                    @else
                        <a href="{{ route('login') }}" style="color: #fff">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color: #fff">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </body>
</html>
