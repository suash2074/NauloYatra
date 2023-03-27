<header>
    <div class="nav container">
        <a href="#" class="logo">Naulo <span>Yatra</span></a>
        <a href={{ route('home') }}></i>Home</a>
        <a href={{ route('blog') }}></i>Blogs</a>
        <a href={{ route('packages') }}></i>Packages</a>
        <a href={{ route('profile.index') }}>
            @if (isset(auth()->user()->photo) &&
                    auth()->user()->photo != null &&
                    file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                <img alt="Image placeholder" src={{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}
                    class="profile-img">
            @else
                <img class="profile-user-img img-circle elevation-3" src="{{ asset('images/defaultUser.png') }}"
                    alt="User profile picture" class="profile-img">
            @endif
            <span class="profile-name">{{ Auth()->user()->first_name }} {{ Auth()->user()->last_name }}</span>
        </a>

        <a href="{{ route('logout') }}" class="logout"
            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">


            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    {{-- <div class="nav-bar" id="nav-bar">
        <a href="#" class="logo "><img src={{ asset('images/logo.png') }} height="80px" width="180px"
                alt=""></a>
        <div class="navigation">
            <div class="nav-items">
                <i class="uil uil-times nav-close-btn"></i>
                <a href={{ route('home') }}><i class="uil uil-home"></i>Home</a>
                <a href={{ route('blog') }}><i class="uil uil-compass"></i>Blogs</a>
                <a href="">
                    <img src="{{ asset('images/view1.jfif') }}" alt="" class="profile-img">
                    <span class="profile-name">Suash Rajbhandari</span>
                </a>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>


                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>
        </div>
        <i class="uil uil-apps nav-menu-btn"></i>
    </div> --}}
</header>
