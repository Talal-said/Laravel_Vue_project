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
            position: absolute;
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
        .form-check {
            direction: rtl;
            text-align: right;
            margin-left: auto;
            display: block;
            margin-right: 35px;
        }
        .form-check-input {
            margin-right: -1.25rem;
        }
        .input-right{
            direction: rtl;
            text-align: right;
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
                        <a class="nav-link" href="{{url('/')}}#Teams">
                            الأندية
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="login-btn btn btn-common text-white" data-wow-delay="0.3s">تسجيل الدخول</a>
                    </li>
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
</header>
<!-- Header Area wrapper End -->

<!-- Form Section -->
<section id="contact-map" class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">تسجيل الدخول</h1>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-xs-12">
                <div class="container-form">
                    <div class="form-wrapper">
                        <form role="form" method="post" action="{{ route('login') }}" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 form-line">
                                    <div class="form-group">
                                        <input id="email" class="form-control input-right d-block mt-1 w-100" type="email" name="email" value="{{old('email')}}" required autofocus placeholder="البريد الإلكتروني">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-line">
                                    <div class="form-group">
                                        <input id="password" class="form-control input-right d-block mt-1 w-100" type="password" name="password" required autocomplete="current-password" placeholder="كلمة المرور">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-line" style="display: flex;flex-direction: row-reverse;justify-content: space-between;">
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">تذكرني</label>
                                    </div>
                                </div>
                                <div class="col-md-12 form-line">
                                    <div class="form-submit">
                                        <button type="submit" class="btn btn-common" id="form-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                                            تسجيل الدخور</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-line" style="display: flex;flex-direction: row-reverse;justify-content: space-between;">
                                    <div class="mb-3">
                                        <a class="underline text-sm " style="color: #E91E63 !important;" href="{{ route('register') }}">
                                            {{ __('!ليس لديك حساب؟ سجل الآن') }}
                                        </a>
                                    </div>
                                    <div class="mb-3">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm " style="color: #E91E63 !important;" href="{{ route('password.request') }}">
                                                {{ __('نسيت كلمة المرور؟') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Form Section End -->

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

</body>
</html>
