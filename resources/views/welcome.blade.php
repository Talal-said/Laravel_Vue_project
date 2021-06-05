<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>TALAL - Football site</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/css/bootstrap.min.css') }}" >
    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/fonts/line-icons.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/css/slicknav.css') }}">
    <!-- Nivo Lightbox -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/css/nivo-lightbox.css') }}" >
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/css/animate.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/css/main.css') }}">
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('welcomePage/assets/css/responsive.css') }}">

    <style>
        #preloader{
            background: #fff;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: 9999999999;
            position: fixed;
        }
        .box {
            margin: 0 auto;
            width: 80px;
            height: 185px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .box .shadow {
            position: absolute;
            width: 100%;
            height: 10px;
            background-color: grey;
            bottom: 0;
            border-radius: 100%;
            transform: scaleX(0.8);
            opacity: 0.6;
            animation: shadowScale 1s linear infinite;
        }

        .gravity {
            width: 80px;
            height: 80px;
            animation: bounce 1s cubic-bezier(0.68, 0.35, 0.29, 0.54) infinite;
        }

        .ball {
            width: 80px;
            height: 80px;
            background-image: url("{{asset('asset/images/33736.svg')}}");
            background-size: cover;
            animation: roll 0.6s linear infinite;
        }

        @keyframes roll {
            100% {
                transform: rotate(360deg);
            }
        }
        @keyframes bounce {
            50% {
                transform: translateY(100px);
            }
        }
        @keyframes shadowScale {
            50% {
                transform: scaleX(1);
                opacity: 0.8;
            }
        }
        .logo_1 > img, .logo_2 > img{
            width: 100%;
            height: 220px;
            object-fit: contain;
            margin-bottom: 1rem;
        }
        .between{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div class="box">
        <div class="shadow"></div>
        <div class="gravity">
            <div class="ball"></div>
        </div>
    </div>
</div>

<!-- Header Area wrapper Starts -->
<header id="header-wrap">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                    <span class="icon-menu"></span>
                </button>
                <a href="#main-slide" class="navbar-brand"><img src="{{ asset('welcomePage/assets/img/logo.png') }}" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}#header-wrap">
                            الرئيسية
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}#match">
                            المباريات
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}#Teams">
                            الأندية
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('/match') }}" class="login-btn btn btn-common text-white" data-wow-delay="0.3s">
                                لوحة التحكم
                            </a>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="login-btn btn btn-common text-white" data-wow-delay="0.3s">تسجيل الدخول</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>

        <!-- Mobile Menu Start -->
        <ul class="mobile-menu">
            <li>
                <a class="page-scrool" href="#header-wrap">الرئيسية</a>
            </li>
            <li>
                <a class="page-scrool" href="#match">المباريات</a>
            </li>
            <li>
                <a class="page-scrool" href="#Teams">الأندية</a>
            </li>
            <li>
                <a href="#" class="login-btn btn btn-common text-white" data-wow-delay="0.3s">تسجيل الدخول</a>
            </li>
        </ul>
        <!-- Mobile Menu End -->

    </nav>
    <!-- Navbar End -->

    <!-- Main Carousel Section Start -->
    <div id="main-slide" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main-slide" data-slide-to="0" class="active"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('welcomePage/assets/img/slider/football_2.jpg') }}" alt="First slide">
                <div class="carousel-caption d-md-block">
                    <p class="fadeInUp wow" data-wow-delay=".6s">أهلاً وسهلاً بكم في موقعنا الرياضي</p>
                    <h1 class="wow fadeInDown heading" data-wow-delay=".4s">مبارايات ودوريات عالمية</h1>
                    <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">معرفة المزيد</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('welcomePage/assets/img/slider/football_1.jpg') }}" alt="Second slide">
                <div class="carousel-caption d-md-block">
                    <p class="fadeInUp wow" data-wow-delay=".6s">أهلاً وسهلاً بكم في موقعنا الرياضي</p>
                    <h1 class="wow bounceIn heading" data-wow-delay=".7s">مبارايات ودوريات عالمية</h1>
                    <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">معرفة المزيد</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('welcomePage/assets/img/slider/football_3.jpg') }}" alt="Third slide">
                <div class="carousel-caption d-md-block">
                    <p class="fadeInUp wow" data-wow-delay=".6s">أهلاً وسهلاً بكم في موقعنا الرياضي</p>
                    <h1 class="wow fadeInUp heading" data-wow-delay=".6s">مبارايات ودوريات عالمية</h1>
                    <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">معرفة المزيد</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
            <span class="sr-only">السابق</span>
        </a>
        <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
            <span class="sr-only">التالي</span>
        </a>
    </div>
    <!-- Main Carousel Section End -->

</header>
<!-- Header Area wrapper End -->

<!-- Coundown Section Start -->
<section id="match" class="countdown-timer section-padding">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="heading-count">
                    <h2 class="wow fadeInDown" data-wow-delay="0.2s">:المباراة القادمة سوف تكون خلال</h2>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row time-countdown justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                    <div id="clock" class="time-count"></div>
                </div>
                <a href="#" class="btn btn-common wow fadeInUp" data-wow-delay="0.3s">معرفة التفاصيل</a>
            </div>
        </div>
    </div>
</section>
<!-- Coundown Section End -->

<!-- Coundown Section Start -->
<section id="" class="countdown-timer section-padding">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="heading-count">
                    <h2 class="wow fadeInDown" data-wow-delay="0.2s">: بين</h2>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row time-countdown justify-content-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="logo_1">
                                    <img src="{{ $team_1_logo }}">
                                    <h3>{{ $team_1_name }}</h3>
                                </div>
                            </div>
                            <div class="col-md-4 between">
                                <div>
                                    <h3>VS.</h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="logo_2">
                                    <img src="{{ $team_2_logo }}">
                                    <h3>{{ $team_2_name }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Coundown Section End -->

<!-- Counter Area Start-->
<section class="counter-section section-padding">
    <div class="container">
        <div class="row">
            <!-- Counter Item -->
            <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                <div class="counter wow fadeInRight" data-wow-delay="0.9s">
                    <div class="icon"><i class="lni-users"></i></div>
                    <p>عدد المقاعد المحجوزة</p>
                    <span style="display: inline-flex;"> مقعداً، سارع بالحجز<span style="margin-left: 3px;"> 343 </span></span>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                <div class="counter wow fadeInRight" data-wow-delay="0.6s">
                    <div class="icon"><i class="lni-timer"></i></div>
                    <p>وقت المباراة القادمة</p>
                    <span>@php echo($time); @endphp – @php echo($end_match_time); @endphp</span>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                <div class="counter wow fadeInRight" data-wow-delay="1.2s">
                    <div class="icon"><i class="lni-calendar"></i></div>
                    <p>تاريخ المباراة القادمة</p>
                    <span>@php echo($date); @endphp</span>
                </div>
            </div>
            <!-- Counter Item -->
            <div class="col-md-6 col-lg-3 col-xs-12 work-counter-widget text-center">
                <div class="counter wow fadeInRight" data-wow-delay="0.3s">
                    <div class="icon"><i class="lni-map"></i></div>
                    <p>عنوان المباراة القادمة</p>
                    <span>فلسطين - غزة - ملعب اليرموك</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Area End-->


<!-- Gallary Section Start -->
<section id="Teams" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">الأندية المشاركنا معنا</h1>
                    <p class="wow fadeInDown" data-wow-delay="0.2s">الأندية التي شاركت معنا في دوريات عالمية</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($teams as $team)
                <div class="col-md-6 col-sm-6 col-lg-4">
                    <div class="gallery-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="{{ $team->team_logo }}" alt="">
                            <div class="info-text">
                                <h3>{{ $team->team_name }}</h3>
                            </div>
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="{{ $team->team_logo }}">
                                <i class="lni-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-xs-12">
                <a href="#" class="btn btn-common">عرض المزيد</a>
            </div>
        </div>
    </div>
</section>
<!-- Gallary Section End -->

<!-- Footer Section Start -->
<footer class="footer-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.2s">
                <h3><img src="{{ asset('welcomePage/assets/img/logo.png') }}" alt="" style="width: 60%;"></h3>
                <p>
                    Aorem ipsum dolor sit amet elit sed lum tempor incididunt ut labore el dolore alg minim veniam quis nostrud ncididunt.
                </p>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.4s">
                <h3>QUICK LINKS</h3>
                <ul>
                    <li><a href="#">About Conference</a></li>
                    <li><a href="#">Our Speakers</a></li>
                    <li><a href="#">Event Shedule</a></li>
                    <li><a href="#">Latest News</a></li>
                    <li><a href="#">Event Photo Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
                <h3>RECENT POSTS</h3>
                <ul class="image-list">
                    <li>
                        <figure class="overlay">
                            <img class="img-fluid" src="{{ asset('welcomePage/assets/img/art/a1.jpg') }}" alt="">
                        </figure>
                        <div class="post-content">
                            <h6 class="post-title"> <a href="#">Lorem ipsm dolor sumit.</a> </h6>
                            <div class="meta"><span class="date">October 12, 2018</span></div>
                        </div>
                    </li>
                    <li>
                        <figure class="overlay">
                            <img class="img-fluid" src="{{ asset('welcomePage/assets/img/art/a2.jpg') }}" alt="">
                        </figure>
                        <div class="post-content">
                            <h6 class="post-title"><a href="#">Lorem ipsm dolor sumit.</a></h6>
                            <div class="meta"><span class="date">October 12, 2018</span></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.8s">
                <h3>SUBSCRIBE US</h3>
                <div class="widget">
                    <div class="newsletter-wrapper">
                        <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                            <div class="form-group is-empty">
                                <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Your email" required="">
                                <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-pointer"></i></button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.widget -->
                <div class="widget">
                    <h5 class="widget-title">FOLLOW US ON</h5>
                    <ul class="footer-social">
                        <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                        <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="lni-linkedin-filled"></i></a></li>
                        <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<div id="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-info">
                    <p>© Designed and Developed by <a href="http://uideck.com" rel="nofollow">UIdeck</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Go to Top Link -->
<a href="#" class="back-to-top">
    <i class="lni-chevron-up"></i>
</a>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('welcomePage/assets/js/jquery-min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/jquery.nav.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/wow.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/nivo-lightbox.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/main.js') }}"></script>
@php echo($date) @endphp
@php echo($time) @endphp
<script>
    // Set the date we're counting down to
    var countDownDate = new Date(formatted_string + ' ' + formatted_time).getTime();
    // Update the count down every 1 second
    var x = setInterval(function () {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        var daySpan = "<span>" + days + "</span> أيام";
        var hourSpan = "<span>" + hours + "</span> ساعات";
        var minSpan = "<span>" + minutes + "</span> دقائق";
        var secondSpan = "<span>" + seconds + "</span> ثواني";

        document.getElementsByClassName("days")[0].innerHTML = daySpan;
        document.getElementsByClassName("hours")[0].innerHTML = hourSpan;
        document.getElementsByClassName("minutes")[0].innerHTML = minSpan;
        document.getElementsByClassName("seconds")[0].innerHTML = secondSpan;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            var daySpan = "<span>" + '0' + "</span> أيام";
            var hourSpan = "<span>" + '0' + "</span> ساعات";
            var minSpan = "<span>" + '0' + "</span> دقائق";
            var secondSpan = "<span>" + '0' + "</span> ثواني";

            document.getElementsByClassName("days")[0].innerHTML = daySpan;
            document.getElementsByClassName("hours")[0].innerHTML = hourSpan;
            document.getElementsByClassName("minutes")[0].innerHTML = minSpan;
            document.getElementsByClassName("seconds")[0].innerHTML = secondSpan;
        }
    }, 1000);
    $(document).ready(function() {
        $("body").contents().filter(function() {
            return this.nodeType == 3;
        }).replaceWith("");
    });
</script>
</body>
</html>
