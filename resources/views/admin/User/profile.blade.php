@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div style="z-index: 2">
            <x:notify-messages />
        </div>
        <div class="container-fluid">
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('profile.index') }}">Your
                Profile</a>

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                @if (isset(auth()->user()->photo) &&
                                        auth()->user()->photo != null &&
                                        file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                    <img alt="Image placeholder"
                                        src={{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}
                                        style="height:38px">
                                @else
                                    <img class="profile-user-img img-circle elevation-3"
                                        src="{{ asset('images/defaultUser.png') }}" alt="User profile picture">
                                @endif
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm font-weight-bold">{{ Auth::user()->first_name }}
                                    {{ Auth::user()->last_name }} </span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href={{ url('admin/profile') }} class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="{{ route('user.index') }}" class="dropdown-item">
                            <i class="ni ni-circle-08"></i>
                            <span>Users</span>
                        </a>
                        <a href="{{ route('trek.index') }}" class="dropdown-item">
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
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
        style="min-height: 600px; background-image: url(../images/images2.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white" style="text-transform:capitalize">Hello
                        {{ Auth::user()->username }},
                    </h1>
                    <p class="text-white mt-0 mb-5">You're currently on your profile page, which is all about you! This
                        page is where you can update and make changes to your personal information, like your name,
                        email, and password, to ensure that your account is secure and up-to-date. Feel free to make any
                        updates or changes as needed!</p>
                    <a href="{{ route('home') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    <form action="{{ route('adminProfile.update', auth()->user()->id) }}" method="post" class="form"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        @if (isset(auth()->user()->photo) &&
                                                auth()->user()->photo != null &&
                                                file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                            <img src={{ asset('uploads/user/' . auth()->user()->photo) }}
                                                style="height:180px; width:180px" class="rounded-circle">
                                        @else
                                            <img class="profile-user-img img-circle elevation-3"
                                                src="{{ asset('images/defaultUser.png') }}" alt="User profile picture">
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info mr-4"
                                    style="width: 67px; text-transform:capitalize">{{ auth()->user()->role }}</a>
                                <a href="#" class="btn btn-sm btn-default float-right"
                                    style="width: 67px">{{ auth()->user()->status }}</a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div class="col-7">
                                            <input class="form-control" type="file" value="" name="photo"
                                                id="photo" style="border: none">
                                            @error('photo')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="pl-lg-4 d-none">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">First
                                                Name</label>
                                            <input type="text" id="first_name" name="first_name"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->first_name }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Last
                                                Name</label>
                                            <input type="text" id="last_name" name="last_name"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Username</label>
                                            <input type="text" id="username" name="username"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->username }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pl-lg-4 d-none">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email
                                                address</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="address" name="address"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ auth()->user()->address }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="input-address">Contact_number</label>
                                            <input id="phone" name="phone"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ auth()->user()->password }}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="text-center">
                                <h3>
                                    {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}<span
                                        class="font-weight-light"></span>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>{{ auth()->user()->address }}, Nepal
                                </div>
                                <div class="h5 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>Welcome to my profile, feel free to
                                    take a
                                    look around!
                                </div>

                                @if (auth()->user()->role == 'guide' && auth()->user()->availability == 'Available')
                                    <hr class="my-4" />

                                    <div>
                                        <i class="ni education_hat mr-2"></i>I am excited to share a wonderful
                                        adventure
                                        with you, and am currently <span
                                            class="text-green">{{ auth()->user()->availability }}</span> for booking.
                                        Let's make it a great one!.
                                    </div>
                                @elseif(auth()->user()->role == 'guide' && auth()->user()->availability == 'Not Available')
                                    <hr class="my-4" />

                                    <div>
                                        <i class="ni education_hat mr-2"></i>I apologize, but at the moment I am <span
                                            class="text-red">{{ auth()->user()->availability }}</span> to book any
                                        adventure,
                                        I will be happy to schedule one with you in the future.
                                    </div>
                                @endif
                                {{-- <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs
                                and records all of his own music.</p>
                            <a href="#">Show more</a> --}}
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-2"><u>Others</u></h6>
                                @if (
                                    (auth()->user()->role == 'guide' && auth()->user()->availability == 'Available') ||
                                        (auth()->user()->role == 'guide' && auth()->user()->availability == 'Not Available'))
                                    <p class="text-" style="font-size: 13px">Per day charge: Rs
                                        {{ auth()->user()->cost_per_day }}</p>
                                @endif
                                <p style="font-size: 13px">Created at: {{ auth()->user()->created_at }}</p>
                                <p style="font-size: 13px">Updated at: {{ auth()->user()->updated_at }}</p>
                                <button type="submit" value="submit" class="btn btn-info">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ auth()->user()->username }} Details</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                  <a href="{{ route('user.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            {{ implode('', $errors->all('<div>:message</div>')) }}
                        @endif
                        <form action="{{ route('adminProfile.update', auth()->user()->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">First Name</label>
                                            <input type="text" id="first_name" name="first_name"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->first_name }}">
                                            @error('first_name')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Last Name</label>
                                            <input type="text" id="last_name" name="last_name"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Username</label>
                                            <input type="text" id="username" name="username"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->username }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4" />
                            <!-- Address -->
                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email address</label>
                                            <input type="email" id="email" name="email"
                                                class="form-control form-control-alternative"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="address" name="address"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ auth()->user()->address }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="input-address">Contact_number</label>
                                            <input id="phone" name="phone"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Password</label>
                                            <input type="password" id="password" name="password"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ auth()->user()->password }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" value="submit"
                                            class="btn btn-info float-right">Update</button>

                                    </div>
                                </div>
                            </div>

                        </form>

                        <hr class="my-4" />
                        <!-- Address -->
                        <h6 class="heading-small text-muted mb-4">Update Password</h6>



                        <div class="pl-lg-4">
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif
                            <form action="{{ route('adminProfile.update', auth()->user()->id) }}" method="post"
                                class="form" enctype="multipart/form-data">
                                @method('put')
                                @csrf

                                <div class="pl-lg-4 d-none">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">First
                                                    Name</label>
                                                <input type="text" id="first_name" name="first_name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ auth()->user()->first_name }}">
                                                @error('first_name')
                                                    <span class="invalid-feedback"
                                                        role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Last
                                                    Name</label>
                                                <input type="text" id="last_name" name="last_name"
                                                    class="form-control form-control-alternative"
                                                    value="{{ auth()->user()->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-first-name">Username</label>
                                                <input type="text" id="username" name="username"
                                                    class="form-control form-control-alternative"
                                                    value="{{ auth()->user()->username }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pl-lg-4 d-none">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input type="email" id="email" name="email"
                                                    class="form-control form-control-alternative"
                                                    value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input id="address" name="address"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Home Address" value="{{ auth()->user()->address }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label"
                                                    for="input-address">Contact_number</label>
                                                <input id="phone" name="phone"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Home Address" value="{{ auth()->user()->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-none">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Password</label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Home Address"
                                                    value="{{ auth()->user()->password }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Current
                                                Password</label>
                                            <input type="password" id="oldPassword" name="oldPassword"
                                                class="form-control form-control-alternative" value="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">New Password</label>
                                            <input type="password" id="newPassword" name="newPassword"
                                                class="form-control form-control-alternative" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Conform New
                                                Password</label>
                                            <input type="password" id="retypeNewPassword" name="retypeNewPassword"
                                                class="form-control form-control-alternative" value="">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" value="submit"
                                    class="btn btn-info float-right">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.adminInclude.footer')
