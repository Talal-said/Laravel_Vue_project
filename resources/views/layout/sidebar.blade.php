<!--**********************************
        Sidebar start
    ***********************************-->
<div class="quixnav" id="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">القائمة الرئيسية</li>
            <li class=""><a class="has-arrow" href="javascript:void()" aria-expanded="true">
                    <i class="far fa-futbol"></i><span class="nav-text">المباريات</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('match') }}">عرض المباريات</a></li>
                    <li><a href="{{ url('match/create') }}">إضافة مباراة</a></li>
                </ul>
            </li>
            <li class=""><a class="has-arrow" href="javascript:void()" aria-expanded="true">
                    <i class="fas fa-tshirt"></i><span class="nav-text">الأندية</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('team') }}">عرض الأندية</a></li>
                    <li><a href="{{ url('team/create') }}">إضافة نادي</a></li>
                </ul>
            </li>
            <li class=""><a class="has-arrow" href="javascript:void()" aria-expanded="true">
                    <i class="fas fa-trophy"></i><span class="nav-text">الدوريات</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('league') }}">عرض الدوريات</a></li>
                    <li><a href="{{ url('league/create') }}">إضافة دوري</a></li>
                </ul>
            </li>
        </ul>
    </div>


</div>
<!--**********************************
    Sidebar end
***********************************-->
