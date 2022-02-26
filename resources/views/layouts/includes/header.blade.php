<header>
    <div class="logo-wrapper">
        <i class='bx bx-menu' onclick="toggleNav()"></i>
        <a href="{{ url('/') }}">
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}"/>
            </div>
            <span class="logo-title">Jasmin Fashion</span>
        </a>
    </div>
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
