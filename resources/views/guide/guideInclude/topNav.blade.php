<!-- User -->
<div style="z-index: 2">
    <x:notify-messages />
</div>
<ul class="navbar-nav align-items-center d-none d-md-flex">
    <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    @if (isset(auth()->user()->photo) &&
                            auth()->user()->photo != null &&
                            file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                        <img alt="Image placeholder" src={{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}
                            style="height:38px">
                    @else
                        <img class="profile-user-img img-circle elevation-3" src="{{ asset('images/defaultUser.png') }}"
                            alt="User profile picture">
                    @endif
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm font-weight-bold">{{ Auth::user()->username }}</span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href={{ route('guide.guideProfile.index') }} class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
            </a>
            <a href="{{ url('home') }}" class="dropdown-item">
                <i class="ni ni-building"></i>
                <span>Home</span>
            </a>
            <a href="{{ route('guide.trek.index') }}" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Treks</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('logout') }}" class="dropdown-item"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <i class="ni ni-user-run"></i>


                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

        </div>
    </li>
</ul>
</div>
</nav>
<!-- End Navbar -->
<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
