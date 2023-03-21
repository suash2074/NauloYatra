@if (@Auth::user()->role == 'guide')
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand pt-0" href="{{ route('home') }}">
                <img src={{ asset('images/logo.png') }} class="navbar-brand-img" alt="..." />
            </a>
            <!-- User -->
            <ul class="nav align-items-center d-md-none">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                        aria-labelledby="navbar-default_dropdown_1">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg" />
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="./examples/profile.html" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html">
                                <img src={{ asset('images/logo.png') }} />
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended"
                            placeholder="Search" aria-label="Search" />
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item  active ">
                        <a class="nav-link  active " href="{{ route('home') }}">
                            <i class="ni ni-tv-2 text-primary"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ route('user.index') }}">
                            <i class="ni ni-single-02 text-yellow"></i> Users
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ni ni-square-pin text-green"></i>
                            <span class="mb-0 text-sm"> Adventure</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="{{ route('trek.index') }}" class="dropdown-item">
                                <i class="ni ni-compass-04 text-orange"></i>
                                <span>Trek</span>
                            </a>

                            <a href="{{ route('about.index') }}" class="dropdown-item">
                                <i class="ni ni-books text-default"></i>
                                <span>About Trek</span>
                            </a>
                            <a href="{{ route('culture.index') }}" class="dropdown-item">
                                <i class="ni ni-single-02 text-green"></i>
                                <span>Cultures</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-sound-wave text-red"></i>
                            <span class="mb-0 text-sm"> First Aid</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="{{ route('medicine.index') }}" class="dropdown-item">
                                <i class="ni ni-favourite-28 text-orange"></i>
                                <span>Medicines</span>
                            </a>

                            <a href="{{ route('healthKit.index') }}" class="dropdown-item">
                                <i class="ni ni-ruler-pencil text-info"></i>
                                <span>Health Kit</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-image text-default"></i>
                            <span class="mb-0 text-sm">Images</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="{{ route('galleryDetail.index') }}" class="dropdown-item">
                                <i class="ni ni-archive-2 text-orange"></i>
                                <span>Gallery Detail</span>
                            </a>

                            <a href="{{ route('gallery.index') }}" class="dropdown-item">
                                <i class="ni ni-album-2 text-green"></i>
                                <span>Galleries</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comment.index') }}">
                            <i class="ni ni-chat-round text-info"></i> Comments
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-single-copy-04 text-danger"></i>
                            <span class="mb-0 text-sm">News</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="{{ route('news.index') }}" class="dropdown-item">
                                <i class="ni ni-archive-2 text-orange"></i>
                                <span>News</span>
                            </a>

                            <a href="{{ route('newsDetail.index') }}" class="dropdown-item">
                                <i class="ni ni-collection text-Default"></i>
                                <span>News Details</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ni ni-cart text-default"></i>
                            <span class="mb-0 text-sm">Packages</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="{{ route('package.index') }}" class="dropdown-item">
                                <i class="ni ni-bag-17 text-orange"></i>
                                <span>Packages</span>
                            </a>

                            <a href="{{ route('packageDetail.index') }}" class="dropdown-item">
                                <i class="ni ni-ruler-pencil text-yellow"></i>
                                <span>Package Details</span>
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('booking.index') }}">
                            <i class="ni ni-credit-card text-primary"></i> Bookings
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
            </div>
        </div>
    </nav>
@endif
