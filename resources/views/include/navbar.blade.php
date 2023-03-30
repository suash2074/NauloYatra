<header>
    <div class="nav container">
        <a href="{{ route('home') }}" class="logo">Naulo <span>Yatra</span></a>
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
</header>
