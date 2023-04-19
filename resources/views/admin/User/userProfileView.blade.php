@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">User Profile
                View</a>

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
                        <a href="{{ url('admin/profile') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Blog</span>
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
        style="min-height: 600px; background-image: url(../../images/images2.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-7 col-md-10">
                    <h1 class="display-2 text-white" style="text-transform:capitalize">Hello {{ Auth::user()->role }},
                    </h1>
                    <p class="text-white mt-0 mb-5">This is {{ @$user_data->role }} profile page.Here, you will be able
                        to view all of {{ @$user_data->role }}'s personal details and information. Currently you are
                        viewing Mr.{{ @$user_data->first_name }}'s profile. </p>
                    <a href="{{ route('user.index') }}" class="btn btn-info">Back</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if (isset($user_data->photo) &&
                                            @$user_data->photo != null &&
                                            file_exists(public_path() . '/uploads/user/' . @$user_data->photo))
                                        <img src={{ asset('uploads/user/' . @$user_data->photo) }}
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
                                style="width: 67px; text-transform:capitalize">{{ @$user_data->role }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right"
                                style="width: 67px">{{ @$user_data->status }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ @$user_data->first_name }} {{ @$user_data->last_name }}<span
                                    class="font-weight-light"></span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ @$user_data->address }}, Nepal
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Welcome to my profile, feel free to take a
                                look around!
                            </div>

                            @if (@$user_data->role == 'guide' && @$user_data->availability == 'Available')
                                <hr class="my-4" />

                                <div>
                                    <i class="ni education_hat mr-2"></i>I am excited to share a wonderful adventure
                                    with you, and am currently <span
                                        class="text-green">{{ @$user_data->availability }}</span> for booking.
                                    Let's make it a great one!.
                                </div>
                            @elseif(@$user_data->role == 'guide' && @$user_data->availability == 'Not Available')
                                <hr class="my-4" />

                                <div>
                                    <i class="ni education_hat mr-2"></i>I apologize, but at the moment I am <span
                                        class="text-red">{{ @$user_data->availability }}</span> to book any adventure,
                                    I will be happy to schedule one with you in the future.
                                </div>
                            @endif
                            {{-- <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs
                                and records all of his own music.</p>
                            <a href="#">Show more</a> --}}
                            <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-2"><u>Others</u></h6>
                            {{-- @if (
                                (@$user_data->role == 'guide' && @$user_data->availability == 'Available') ||
                                    (@$user_data->role == 'guide' && @$user_data->availability == 'Not Available'))
                                <p class="text-" style="font-size: 13px">Per day charge: Rs
                                    {{ @$user_data->cost_per_day }}</p>
                            @endif --}}
                            <p style="font-size: 13px">Created at: {{ @$user_data->created_at }}</p>
                            <p style="font-size: 13px">Updated at: {{ @$user_data->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ @$user_data->username }} details</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                  <a href="{{ route('user.edit') }}" class="btn btn-sm btn-primary">Edit</a>
                </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">First Name</label>
                                            <input type="text" id="input-username"
                                                class="form-control form-control-alternative"
                                                value="{{ @$user_data->first_name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Last Name</label>
                                            <input type="text" id="input-username"
                                                class="form-control form-control-alternative"
                                                value="{{ @$user_data->last_name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Username</label>
                                            <input type="text" id="input-first-name"
                                                class="form-control form-control-alternative"
                                                value="{{ @$user_data->username }}">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div> --}}
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
                                            <input type="email" id="input-email"
                                                class="form-control form-control-alternative"
                                                value="{{ @$user_data->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ @$user_data->address }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label"
                                                for="input-address">Contact_number</label>
                                            <input id="input-address" class="form-control form-control-alternative"
                                                placeholder="Home Address"
                                                value="{{ '+977-' . @$user_data->phone }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code">
                      </div>
                    </div>
                  </div> --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Password</label>
                                            <input type="password" id="input-address"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ @$user_data->password }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <hr class="my-4" /> --}}
                            <!-- Description -->
                            {{-- <h6 class="heading-small text-muted mb-4">Others</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Password</label>
                                            <input type="password" id="input-address"
                                                class="form-control form-control-alternative"
                                                placeholder="Home Address" value="{{ @$user_data->password }}">
                                        </div>
                                    </div>
                                </div> --}}
                            {{-- <div class="form-group">
                                    <label>About Me</label>
                                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                </div> --}}
                            {{-- </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.adminInclude.footer')
