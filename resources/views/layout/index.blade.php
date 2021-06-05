<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('asset/css/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('asset/css/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('asset/css/myEdit.css')}}" rel="stylesheet">
    @yield('styles')
    <style>
        .box {
            margin: 0 auto;
            width: 80px;
            height: 185px;
            position: relative;
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
    </style>
</head>

<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="box">
        <div class="shadow"></div>
        <div class="gravity">
            <div class="ball"></div>
        </div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->


<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper" class="menu-toggle">

    @include('layout.navHeader')
    @include('layout.sidebar')

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body" id="content-body" style="min-height: calc(100vh - 58px);">
        <!-- row -->
        <div class="container-fluid">
            <div class="row" id="vue-app" v-cloak>
                @yield('mainWorkspace')
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->

    @include('layout.footer')

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->



<!-- Required vendors -->
<script src="{{asset('asset/css/vendor/global/global.min.js')}}"></script>
<script src="{{asset('asset/js/quixnav-init.js')}}"></script>
<script src="{{asset('asset/js/custom.min.js')}}"></script>


<!-- Vectormap -->
<script src="{{asset('asset/css/vendor/raphael/raphael.min.js')}}"></script>
{{--<script src="{{asset('css/vendor/morris/morris.min.js')}}"></script> for graphics--}}


<script src="{{asset('asset/css/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('asset/css/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<script src="{{asset('asset/css/vendor/gaugeJS/dist/gauge.min.js')}}"></script>

<!--  flot-chart js -->
<script src="{{asset('asset/css/vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('asset/css/vendor/flot/jquery.flot.resize.js')}}"></script>

<!-- Owl Carousel -->
<script src="{{asset('asset/css/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{ asset('welcomePage/assets/js/jquery-min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('welcomePage/assets/js/bootstrap.min.js') }}"></script>

<!-- Counter Up -->
<script src="{{asset('asset/css/vendor/jqvmap/js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('asset/css/vendor/jqvmap/js/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('asset/css/vendor/jquery.counterup/jquery.counterup.min.js')}}"></script>
{{--<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script> for graphics--}}
<script src="{{asset('asset/js/dashboard/myEdit.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@yield('scripts')
@stack('jquery')

<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
