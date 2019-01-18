<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <title>FESAMM - Stock Website</title>
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
                <div class="col-lg-6 banner-w3layouts-info">
                    <h2 data-aos="fade-up">FESAMM
                    </h2>
                    <h3 class="mb-3" data-aos="fade-up">Stock Portfolio Simulator</h3>
                    <p class="mb-4" data-aos="fade-up">Are you looking to invest you money in stocks and make some side income? You've come to the best place! Build your portfolio and react to the markets in real time.</p>
                    <a href="{{ url('/portfolio') }}" class="btn">My Portfolio</a>
                </div>
                <div class="col-lg-6 banner-w3layouts-image">
                    <div class="effect-w3">
                        <img src="images/stocks1.jpg" alt="" class="img-fluid image1">
                        <img src="images/stocks1.jpg" alt="" class="img-fluid image2">
                        <img src="images/stocks1.jpg" alt="" class="img-fluid image3">
                        <img src="images/stocks1.jpg" alt="" class="img-fluid image4">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- //banner-w3layouts -->
</div>
<!--/ab -->
<section class="about py-lg-5 py-md-5 py-3">
    <div class="container">
        <div class="inner-sec-wthree py-lg-5 py-3">
            <h3 class="tittle text-uppercase text-center mb-lg-5 mb-3"><span class="sub-tittle">About.</span> Cutting Edge Tech in a Browser</h3>
            <div class="feature-grids row mb-lg-5 mb-3">
                <div class="col-lg-4 p-0" data-aos="fade-up">
                    <div class="bottom-gd p-5">

                        <h3 class="my-3"> <span class="fa fa-crosshairs" aria-hidden="true"></span>Wide Range of Choices</h3>
                        <p>With our vast trading network, you can lookup for any stock you're interested!</p>
                    </div>
                </div>
                <div class="col-lg-4 p-0" data-aos="fade-up">
                    <div class="bottom-gd2-active p-5">

                        <h3 class="my-3"> <span class="fa fa-clone" aria-hidden="true"></span>Top-notch Research</h3>
                        <p>Use top-notch research and innovative tools to select and manage your investments.</p>
                    </div>
                </div>
                <div class="col-lg-4 p-0" data-aos="fade-up">
                    <div class="bottom-gd p-5">

                        <h3 class="my-3"> <span class="fa fa-laptop" aria-hidden="true"></span>Low Commissions</h3>
                        <p>Pay only $10 flat per trade — no minimum balance or trading activity required</p>
                    </div>
                </div>

            </div>
            <!-- services -->
            <div class="fetured-info pt-lg-5">
                <h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle">What we do</span> Our Featured Services</h3>
                <div class="row fetured-sec mt-lg-5">

                    <div class="col-lg-6 serv_bottom">
                        <div class="featured-left text-center">
                            <div class="bottom-gd fea p-5 my-3" data-aos="fade-left">
                                <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                                <h3 class="my-3 text-uppercase">Open Trading World</h3>
                                <p class="px-lg-3">With our vast trading network, you can lookup for any stock you're interested in and buy with a simple click of a button! We got you covered!</p>
                            </div>
                            <div class="bottom-gd fea active p-5" data-aos="fade-left">
                                <span class="fa fa-laptop" aria-hidden="true"></span>
                                <h3 class="my-3 text-uppercase">10,000$ starting money</h3>
                                <p class="px-lg-3">Every user starts with a virtual 10,000$ in his portfolio account. Allowing you to buy and sale without loosing anything! Keep the risks aside and focus on trading!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <img src="images/img1.jpg" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
            <!-- //services -->
        </div>
    </div>
</section>
<!-- //ab -->
<!--/counter-->
<section class="stats py-lg-5 py-4">
    <div class="container">
        <div class="row text-center">
            <div class="col">
                <div class="counter">
                    <h3 class="count-title count-number">100+</h3>
                    <p class="count-text ">Users</p>
                </div>
            </div>
            <div class="col">
                <div class="counter">
                    <h3 class="count-title count-number">1700+</h3>
                    <p class="count-text ">Happy Hours</p>
                </div>
            </div>
            <div class="col">
                <div class="counter">
                    <h3 class="count-title count-number">11900+</h3>
                    <p class="count-text ">Trades Everyday</p>
                </div>
            </div>
            <div class="col">
                <div class="counter">
                    <h3 class="count-title count-number">157+</h3>
                    <p class="count-text ">New Registration Everyday</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//counter-->
<!--//team -->
<section class="banner-w3layouts-bottom py-lg-5 py-4">
    <div class="container">
        <div class="inner-sec-wthree py-lg-5 py-4 speak">
            <h3 class="tittle text-uppercase text-center my-lg-5 my-3"><span class="sub-tittle">Amazing People</span> Our Great Team</h3>
            <div class="row mt-lg-5 mt-4">
                <div class="col-md-4 team-gd text-center" data-aos="fade-right">
                    <div class="team-img mb-4">
                        <img src="images/mihail.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Developer</span>Mihail Cerba</h3>
                        <p>Mihail Cerba has more than 3 years of experience in Development.</p>
                    </div>
                </div>

                <div class="col-md-4 team-gd second text-center">
                    <div class="team-img mb-4">
                        <img src="images/moe.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Developer</span>Mohamed Hamza</h3>
                        <p>Mohamed Hamza has more than 3 years of experience in Development.</p>
                    </div>
                </div>

                <div class="col-md-4 team-gd second text-center">
                    <div class="team-img mb-4">
                        <img src="images/sonya.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Developer</span>Sonya Rabhi</h3>
                        <p>Sonya Rabhi has more than 3 years of experience in Development.</p>
                    </div>
                </div>

                <div class="col-md-4 team-gd second text-center" style="background:white;border: none;box-shadow: none;">

                </div>
                <div class="col-md-4 team-gd text-center" data-aos="fade-left">
                    <div class="team-img mb-4">
                        <img src="images/alpha.jpg" class="img-fluid rounded-circle" alt="user-image">
                    </div>
                    <div class="team-info">
                        <h3 class="mt-md-4 mt-3"><span class="sub-tittle-team">Developer</span>Alpha Kaba</h3>
                        <p>Alpha Kaba has more than 3 years of experience in Development.</p>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!--//team -->

<!--/model-->
<div class="modal fade" id="exampleModalCenter5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n1.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n2.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter7" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n3.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter8" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n4.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n9.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter10" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n5.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalCenter11" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n7.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter12" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n8.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter13" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-3">
                <div class="login px-4 mx-auto mw-100 gal-img pb-3">
                    <img class="img-fluid col-md-12" src="images/n6.jpg" alt="Slog">
                </div>
            </div>

        </div>
    </div>
</div>
<!--//model-->

<!--//portfolio-->

<!-- /hand-crafted -->
<section class="hand-crafted py-4">
    <div class="container py-xl-5 py-lg-3">
        <div class="row banner-w3layouts-grids">
            <div class="col-lg-6 banner-w3layouts-image">
                <div class="effect-w3">
                    <img src="images/img2.jpg" alt="" class="img-fluid image1">
                    <img src="images/img2.jpg" alt="" class="img-fluid image2">
                    <img src="images/img2.jpg" alt="" class="img-fluid image3">
                    <img src="images/img2.jpg" alt="" class="img-fluid image4">
                </div>

            </div>
            <div class="col-lg-6 banner-w3layouts-info pl-md-5">

                <h3 class="mb-3" data-aos="fade-up">“What Are the Advantages of Owning Stocks?”</h3>
                <p class="mb-4" data-aos="fade-up">If you’re comfortable with fluctuating returns, stocks offer a variety of benefits including the potential for superior long-term returns compared to cash and fixed income investments and the possibility to earn dividends and capital gains. </p>
                <p class="mb-4" data-aos="fade-up">Over time, the stock market tends to rise in value, though the prices of individual stocks rise and fall daily. Investments in stable companies that are able to grow tend to make profits for investors.Likewise, investing in many different stocks will help build your wealth by leveraging growth in different sectors of the economy, resulting in a profit even if some of your individual stocks lose value.</p>
            </div>
        </div>
    </div>
</section>
<!-- //hand-crafted -->

<!-- testimonials -->
<div class="testimonials py-md-5 py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="tittle text-uppercase text-center mb-lg-5 mb-3"><span class="sub-tittle">See what people are saying</span> Testimonials</h3>
        <div id="carouselExampleIndicators" class="carousel slide pb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-lg-6 testimonials_grid" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> Really Satisfied with the quality of the Service and the simple design of the website.
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/te1.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Claudia Carl</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 testimonials_grid mt-lg-0 mt-4" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> This amazing website allowed me to upgrade my skills in stock trading!
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/te2.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Adam Ster</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6 testimonials_grid" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> I recommend this website to anyone who wants to get into stock trading but is afraid to lose!
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/te3.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Ava Carl</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 testimonials_grid mt-lg-0 mt-4" data-aos="fade-up">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> I really like how simple the website looks and feels. Everything is available to you and easy to find!
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/team.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4 mt-2">
                                        <h5 class="mb-2">Jakob Stan</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-lg-6 testimonials_grid">
                            <div class="bg-white rounded p-md-5 p-4">
                                <p class="sub-test"><i class="fa fa-quote-left" aria-hidden="true"></i> The Best Stock Simulator Ever!! This Website has a verity of stocks and all necessary information!
                                </p>
                                <div class="row mt-4">
                                    <div class="col-3 testi-img-res">
                                        <img src="images/team2.jpg" alt=" " class="img-fluid rounded-circle" />
                                    </div>
                                    <div class="col-9 testi_grid  mt-xl-3 mt-lg-2 mt-md-4  mt-2">
                                        <h5 class="mb-2">Henri Pringles</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //testimonials -->


<!-- copy-w3layoutsright -->
<div class="cpy-right text-center py-3">
    <p class="copy-w3layouts">© 2018 FESAMM. All rights reserved
    </p>
</div>
<!-- //copy-w3layoutsright -->

<!--model-forms-->
<!--/Login-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Login Now</h5>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="mb-2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required="">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="" required="">
                        </div>
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary submit mb-4">Sign In</button>
                        <p class="text-left pb-4">
                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter2"> Don't have an account?</a>
                        </p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!--//Login-->
<!--/Register-->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-left">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login px-4 mx-auto mw-100">
                    <h5 class="text-left mb-4">Register Now</h5>
                    <form action="#" method="post">
                        <div class="form-group">
                            <label>First name</label>

                            <input type="text" class="form-control" id="validationDefault01" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Last name</label>
                            <input type="text" class="form-control" id="validationDefault02" placeholder="" required="">
                        </div>

                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" id="password1" placeholder="" required="">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" id="password2" placeholder="" required="">
                        </div>

                        <button type="submit" class="btn btn-primary submit mb-4">Register</button>
                        <p class="text-left pb-4">
                            <a href="#">By clicking Register, I agree to your terms</a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!--//Register-->
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
<!--/counter-->
<script src="js/counternew.js"></script>
<!--//counter-->
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