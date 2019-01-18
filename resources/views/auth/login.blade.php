<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>FESAMM - Login</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Slog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/portfolio.css">
    <link rel="stylesheet" href="css/aos.css">
    <link href='css/aos-animation.css' rel='stylesheet prefetch' type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700i" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>
<!-- mian-content -->
<div class="main-content" id="home">
    <!-- header -->
    <header class="py-1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="header-right">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                <a class="signin mr-4" href="/">Home<i class="fas fa-sign-in-alt"></i></a>
                                @auth
                                    <a class="signin mr-4" href="{{ url('/portfolio') }}">My Portfolio</a>
                                @else
                                    <a class="signin mr-4" href="{{ route('login') }}">Login<i class="fas fa-sign-in-alt"></i></a>

                                    @if (Route::has('register'))
                                        <a class="signin mr-4" href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- //header -->
    <!-- banner-w3layouts -->
    <section class="banner-w3layouts">
        <div class="container">
            <div class="row banner-w3layouts-grids">
                <div class="col-lg-5 sign-info" data-aos="fade-right">
                    <h3>Sign in to your Account</h3>
                    <p class="para-sign mt-2 mb-4 text-center">Enter your details to Login.</p>
                    <!--Form-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">

                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <div class="icon1">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="color: white" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="password">{{ __('Password') }}</label>
                            <div class="icon2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="color: white" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <label class="anim">
                            <input class="checkbox"type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </label>
                        <div class="clearfix"></div>
                        <br>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" onMouseOver="this.style.color='#0F0'"  onMouseOut="this.style.color='#FFF'" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <p class="para-sign mt-3">Don’t know an Account ? <a href="{{ route('register') }}" class="ml-2"><strong>Create your Account</strong></a></p>
                    </form>
                </div>
                <div class="col-lg-7 banner-w3layouts-image pl-md-5">
                    <div class="effect-w3">
                        <img src="images/img4.jpg" alt="" class="img-fluid image1">
                        <img src="images/img4.jpg" alt="" class="img-fluid image2">
                        <img src="images/img4.jpg" alt="" class="img-fluid image3">
                        <img src="images/img4.jpg" alt="" class="img-fluid image4">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- //banner-w3layouts -->
</div>
<!-- copy-FESAMM -->
<div class="cpy-right text-center py-3">
    <p class="copy-w3layouts">© 2018 FESAMM. All rights reserved | Design by
    </p>
</div>
<!-- //copy-FESAMM -->
<script src="js/jquery-2.2.3.min.js"></script>
<!--/aos -->
<script src="js/aos.js"></script>
<script>
    AOS.init({
        easing: 'ease-out-back',
        duration: 1000
    });

</script>
<!--//aos -->
<!--/ start-smoth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 900);
        });
    });

</script>
<script>
    $(document).ready(function() {
        /*
                                var defaults = {
                                      containerID: 'toTop', // fading element id
                                    containerHoverID: 'toTopHover', // fading element hover id
                                    scrollSpeed: 1200,
                                    easingType: 'linear'
                                 };
                                */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });

</script>
<!--// end-smoth-scrolling -->

<!-- //js -->

<script src="js/bootstrap.js"></script>

</body>

</html>
