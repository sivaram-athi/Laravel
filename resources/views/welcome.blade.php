<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">portfolio .</a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-5 ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Assesment/index.html">Assessment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Assignment/index.html">Assignment</a>
                        </li>

                        
                    </ul>
                </div>
            </div>
        </nav>
        <section class="home">
            <div class="home-content">
                <h3>Hello, It's Me</h3>
                <h1>Athi Sivaram</h1>
                <h3>I'm a <span>Fullstack Developer</span></h3>
                <div class="social-media">
                    <a href="https://www.linkedin.com/in/athisivaram-s-107910216?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank"><i class="fa fab fa-linkedin-in fa-2xl" style="color: #fff;"></i></a>
                    {{-- <a href="#"><i class="fa fab fa-facebook fa-2xl" style="color: #fff;"></i></a> --}}
                    {{-- <a href="#"><i class="fa fab fa-instagram fa-2xl" style="color: #fff;"></i></a> --}}
                    <a href="\twitter"><i class="fa fab fa-twitter fa-2xl" style="color: #fff;"></i></a>
                    <a href="\amazon"><i class="fa-brands fa-amazon fa-2xl" style="color: #fff;"></i></a>
                </div>
            </div>
            <div class="home-img ">
                <img class="rounded-circle" src="assets/img/profile.jpg" alt="">
            </div>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.5/lodash.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
