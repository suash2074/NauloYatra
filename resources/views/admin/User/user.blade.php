@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('user.index') }}">User</a>

            @include('admin.adminInclude.topNav')

            @include('admin.adminInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">User table</h3>

                                <!-- Form for searching-->
                                <form action="" class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative border-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control h-25"
                                                placeholder="Search by first, last or username" type="search"
                                                name="search" value="{{ $search }}" />
                                        </div>
                                    </div>
                                </form>

                                <a class="nav-link " href="{{ route('user.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> User
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Profile</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($user_data))
                                            @foreach ($user_data as $users => $user)
                                                <tr>
                                                    <td>{{ $users + 1 }}</td>

                                                    <td>
                                                        <div class="avatar-group">
                                                            <a href="{{ route('user.show', $user->id) }}"
                                                                class="avatar avatar-sm" data-toggle="tooltip"
                                                                data-original-title="{{ Auth::user()->first_name }} {{ Auth::user()->last_Fname }}">
                                                                @if (isset(auth()->user()->photo) &&
                                                                        auth()->user()->photo != null &&
                                                                        file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                                                    <img alt="Image placeholder"
                                                                        src="{{ asset('uploads/user/Thumb-' . $user->photo) }}"
                                                                        style="height:34px" class="rounded-circle">
                                                                @else
                                                                    <img class="profile-user-img img-circle elevation-3"
                                                                        src="{{ asset('images/defaultUser.png') }}"
                                                                        alt="User profile picture" style="height:34px">
                                                                @endif
                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>{{ $user->first_name }}</td>

                                                    <td>{{ $user->last_name }}</td>

                                                    <td>{{ $user->username }}</td>

                                                    <td>{{ $user->email }}</td>

                                                    <td style="text-transform:capitalize">{{ $user->role }}</td>

                                                    <td>{{ $user->status }}</td>

                                                    <td class="text-right d-flex">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light"
                                                                href="#" role="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('user.show', $user->id) }}">View</a>
                                                                <form action="{{ route('user.destroy', $user->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure about deleting this user..!');"
                                                                        href="#">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination d-flex justify-content-between mb-0">
                                        {{ $user_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.adminInclude.footer')
