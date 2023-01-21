<header>
    <div class="nav-bar" id="nav-bar">
        <div class="navigation">
            <div class="nav-items">
                <i class="uil uil-times nav-close-btn"></i>
                <a href={{route('home')}}><i class="uil uil-home"></i>Home</a>
                <a href={{route('blog')}}><i class="uil uil-compass"></i>Blogs</a>
            </div>
        </div>
        <a href="#" class="logo "><img src={{asset("images/logo.png")}} height="80px" width="180px"
                alt=""></a>

        <div class="navigation">
            <div class="nav-items">
                <a href=""><i class="uil uil-user"></i>Profile</a>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i
                        class="uil uil-signout"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <i class="uil uil-apps nav-menu-btn"></i>
    </div>
</header>
