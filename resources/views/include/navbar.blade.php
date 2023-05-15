<header>
    <div style="z-index: 2">
        <x:notify-messages />
    </div>

    @if (auth()->user()->role == 'user')
        <div class="nav container">
            <a href="{{ route('home') }}" class="logo">Naulo <span>Yatra</span></a>
            <div class="navigation">
                <div class="nav-items">
                    <i class="uil uil-times nav-close-btn"></i>
                    <a href={{ route('home') }}><i class="uil uil-home"></i>Home</a>
                    <a href={{ route('blog') }}><i class="uil uil-document-layout-left"></i>Blogs</a>
                    <a href={{ route('packages') }}><i class="uil uil-box"></i>Packages</a>
                    <a href={{ route('profile.index') }}>
                        @if (isset(auth()->user()->photo) &&
                                auth()->user()->photo != null &&
                                file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                            <img alt="Image placeholder" src={{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}
                                class="profile-img">
                        @else
                            <img alt="Image placeholder" src={{ asset('images/defaultUser.png') }} class="profile-img">
                        @endif
                        <span class="profile-name">{{ Auth()->user()->username }}</span>
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
            </div>
            <i class="uil uil-apps nav-menu-btn"></i>
        </div>
    @else
        <div class="nav container">
            <a href="{{ route('home') }}" class="logo">Naulo <span>Yatra</span></a>
            <a href={{ route('blog') }}></i>Blogs</a>

            <a href="{{ route('home') }}" class="logout">


                {{ __('Back') }}
            </a>
        </div>
    @endif

    <script></script>
</header>
