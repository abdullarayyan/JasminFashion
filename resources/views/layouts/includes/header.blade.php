<header>
    <div class="logo-wrapper">
        {{--        <i class='bx bx-menu' onclick="toggleNav()"></i>--}}
        <a href="{{ url('/') }}">

            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}"/>
            </div>
            <span class="logo-title">Jasmin Fashion</span>

        </a>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    @auth

        <div class="right-nav" style="display: contents">
            <ul class="level1" style="margin: 0">
                <ul class="level2" style="margin: 0;">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            عام
                        </a>

                    </li>

                </ul>
            </ul>


            <ul class="level1" style="margin: 0">
                <ul class="level2" style="margin: 0;">
                    <nav class="navbar navbar-expand-lg">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto justify-content-center">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        المتجر
                                    </a>
                                    <ul class="dropdown-menu" id="sss" aria-labelledby="navbarDropdownMenuLink">

                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">فساتين زفاف</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/product">عرض </a></li>
                                                <li><a class="dropdown-item" href="/product/create">اضافة</a></li>
                                            </ul>
                                        </li>

                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">فساتين سهرة</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/party">عرض</a></li>
                                                <li><a class="dropdown-item" href="/party/create">اضافة</a></li>

                                            </ul>
                                        </li>

                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">اكسسوارات</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/accessory">عرض</a></li>
                                                <li><a class="dropdown-item" href="/accessory/create">اضافة</a></li>

                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        </div>
                    </nav>

                </ul>
            </ul>


            <ul class="level1" style="margin: 0">
                <ul class="level2" style="margin: 0;">
                    <nav class="navbar navbar-expand-lg">

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto justify-content-center">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        الحجوزات
                                    </a>
                                    <ul class="dropdown-menu" id="sss" aria-labelledby="navbarDropdownMenuLink">

                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="/reservation">عرض</a>
                                            <a class="dropdown-item dropdown-toggle" href="/reservation/create">اضافة</a>
{{--                                            <ul class="dropdown-menu">--}}
{{--                                                <li><a class="dropdown-item" href="/product">عرض </a></li>--}}
{{--                                                <li><a class="dropdown-item" href="/product/create">اضافة</a></li>--}}
{{--                                            </ul>--}}
                                        </li>
                                    </ul>

                                </li>
                            </ul>

                        </div>
                    </nav>

                </ul>
            </ul>
        </div>
    @endauth

    <div class="left">
        @auth
            <a href="#"><i class='bx bx-cog'></i></a>
            <div>
                <i id="notificationsDropdown" class="bx bx-bell hide_new name dropdown-toggle" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre></i>
                <div class="dropdown-menu dropdown-menu-right text-center p-4" aria-labelledby="notificationsDropdown">
                    {{--                    @forelse(\Auth::user()->unreadNotifications as $notification)--}}
                    {{--                        <a href="#" class="text-primary" onclick="aytamMore18NotificationShown('{{$notification->id}}')">--}}
                    {{--                            {{ $notification->data['message'] }}--}}
                    {{--                        </a>--}}
                    {{--                        <hr />--}}
                    {{--                    @empty--}}
                    {{--                        <h6>--}}
                    {{--                            لايوجد اشعارات !--}}
                    {{--                        </h6>--}}
                    {{--                    @endforelse--}}
                </div>
            </div>


            <div class="profile">
                <img class="profile-image" src={{ url('assets/images/profile-placeholder.png') }} />
                <div class="profile-name">
                    <span id="navbarDropdown" class="name dropdown-toggle" role="button" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                        <i class='bx bxs-chevron-down'></i>
                    </span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('تسجيل الخروج') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                    <span class="job-name">"{{ Auth::user()->name }}"</span>
                </div>
            </div>

        @endauth

    </div>


</header>
<style>
    #product {
        transform: translate3d(-140px, 0px, 0px) !important;
    }

    #accessory {
        transform: translate3d(-120px, 0px, 0px) !important;

    }

    .navbar-nav li:hover > ul.dropdown-menu {
        display: block;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
    }

    /* rotate caret on hover */
    .dropdown-menu > li > a:hover:after {
        text-decoration: underline;
        transform: rotate(-90deg);
    }

</style>
<script>
    $(document).ready(function () {
        $('#accessory').click(function () {
            console.log('dd')
            $('#product').hide()
        })
    })
</script>
