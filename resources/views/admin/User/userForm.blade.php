@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">User</a>

            @include('admin.adminInclude.topNav')

        </div>
</div>
</div>

<div class="container-fluid mt--7">
    <!-- Table -->
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0" style="display:flex; justify-content:space-between">
                    <h3 class="mb-0 font-weight-bold">{{ isset($user_data) ? 'User update Form' : 'User Form' }}</h3>
                    <a class="nav-link " href="{{ route('user.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container-fluid mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($user_data))
                        <form action="{{ route('user.update', @$user_data->id) }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('user.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="first_name" class="form-control-label">First Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Forename" name="first_name"
                                id="example-text-input" value="{{ @$user_data->first_name }}" required>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label for="example-text-input" class="form-control-label">Last Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Surname" name="last_name"
                                value="{{ @$user_data->last_name }}" required id="example-text-input">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label for="example-text-input" class="form-control-label">Username <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Nickname" name="username"
                                value="{{ @$user_data->username }}" required id="example-text-input">
                            @error('username')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-email-input" class="form-control-label">Email <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="email" placeholder="nauloyatra@example.com"
                                name="email" value="{{ @$user_data->email }}" required id="example-email-input">
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Address <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" value="{{ @$user_data->address }}"
                                id="example-text-input" name="address" required placeholder="Pokhara-7">
                            @error('address')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-tel-input" class="form-control-label">Phone <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="tel" placeholder="+977-9827100545" name="phone"
                                value="{{ @$user_data->phone }}" required id="example-tel-input" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Profile</label>
                            <input class="form-control" type="file" value="" name="photo"
                                id="photo">
                            <div class="col-md-4">
                                <img src={{ asset('uploads/user/Thumb-' . @$user_data->photo) }} alt=""
                                    class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                            @error('photo')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-password-input" class="form-control-label">Password <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="password" placeholder="password" name="password"
                                value="{{ @$user_data->password }}" required id="example-password-input">
                            @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-3">
                            <label for="role" class="form-control-label">Role</label>
                            <select type="text" class="form-control" name="role" id="role"
                                onchange="checkSelectedValue()" required>
                                <option {{ @$user_data->role == 'admin' ? 'selected' : '' }}>admin
                                </option>
                                <option {{ @$user_data->role == 'user' ? 'selected' : '' }}>user
                                </option>
                                <option {{ @$user_data->role == 'guide' ? 'selected' : '' }}>guide
                                </option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                    {{-- <div id="admin_div" style="display: none">
                        This is the part of the HTML that will be displayed when the "admin"
                        option is selected.
                      </div> --}}

                    <div class="row d-flex justify-content-between">
                        <div class="col-8 p-0" id="guide" style="display: none;">
                            <div class="d-flex justify-content-between">
                                {{-- <div class="form-group col-5">
                                    <label for="example-tel-input" class="form-control-label">Cost Per Day</label>
                                    <input class="form-control" type="number" placeholder="Rs 1600"
                                        value="{{ @$user_data->cost_per_day }}" name="cost_per_day"
                                        id="cost_per_day">
                                    @error('cost_per_day')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div> --}}

                                <div class="form-group col-5">
                                    <label for="example-password-input"
                                        class="form-control-label">Availability</label>
                                    <select class="form-control" name="availability" id="availability">
                                        <option {{ @$user_data->availability == 'Not Available' ? 'selected' : '' }}>Not
                                            Available
                                        </option>
                                        <option {{ @$user_data->availability == 'Available' ? 'selected' : '' }}>Available
                                        </option>
                                    </select>
                                    @error('availability')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{ @$user_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option {{ @$user_data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
