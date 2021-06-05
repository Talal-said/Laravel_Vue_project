<!--**********************************
        Nav header start
    ***********************************-->
<div class="nav-header" >
    <a href="#" class="brand-logo">
        <img class="logo-abbr" src="{{asset('asset/images/logo.png')}}" alt="not found">
        <img class="logo-compact" src="{{asset('asset/images/logo-text.png')}}" alt="not found">
        <img class="brand-title" src="{{asset('asset/images/logo-text.png')}}" alt="not found">
    </a>

    <div class="nav-control">
        <div class="hamburger is-active" onclick="changeHamburger()">
            <span class="line" onclick="changeHamburger()"></span>
            <span class="line" onclick="changeHamburger()"></span>
            <span class="line" onclick="changeHamburger()"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header" id="header">
    <div class="header-content" id="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="fas fa-search"></i>
                                </span>
                        <div class="dropdown-menu p-0 m-0">
                            <form>
                                <input class="form-control" type="search" placeholder="البحث" aria-label="Search">
                            </form>
                        </div>
                    </div>
                </div>

                <ul class="navbar-nav header-right">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" id="home-btn" class="">
                            <i class="fal fa-user"></i>
                            <span class="mr-2">الصفحة الرئيسية</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" id="logout-btn" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fal fa-key" style="margin-left: 0.5rem;"></i>
                                تسجيل الخروج
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->
