<header>
    <div class="nav-bar" id="nav-bar">
        <a href="#" class="logo "><img src="images/logo deg.png" height="80px" width="180px" alt=""></a>
        <div class="navigation">
            <div class="nav-items">
                <i class="uil uil-times nav-close-btn"></i>
                <a href=""><i class="uil uil-home"></i>Home</a>
                <a href=""><i class="uil uil-compass"></i>Blogs</a>
                <a href=""><i class="uil uil-user"></i>Profile</a>
                {{-- <a href="{{ route('logout') }}"><i class="uil uil-signout"></i>logout</a> --}}

                <a href="{{ route('logout') }}" 
                    onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="uil uil-signout"></i>
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

<div class="media-icons">
    <a href="#"><i class="uil uil-facebook-f"></i></a>
    <a href="#"><i class="uil uil-instagram"></i></a>
    <a href="#"><i class="uil uil-twitter"></i></a>

</div>
