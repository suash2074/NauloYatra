@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('booking.index') }}">Bookings</a>

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
                    <h3 class="mb-0 font-weight-bold">
                        {{ isset($booking_data) ? 'Booking update Form' : 'Booking Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('booking.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($booking_data))
                        <form action="{{ route('booking.update', @$booking_data->id) }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('booking.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">User Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="user_id" id="user_id" required>
                                <option value="" disabled selected hidden>Select User</option>
                                @if (isset($user_info))
                                    @foreach (@$user_info as $user => $data)
                                        <option value="{{ @$user != null ? @$user : '' }}"
                                            {{ @$booking_data->user_id == $user ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('package_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Package Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="package_id" id="package_id" required>
                                <option value="" disabled selected hidden>Select Package</option>
                                @if (isset($package_info))
                                    @foreach (@$package_info as $package => $data)
                                        <option value="{{ @$package != null ? @$package : '' }}"
                                            {{ @$booking_data->package_id == $package ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('package_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Trek Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trek_id" id="trek_id" required>
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$booking_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('trek_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Guide Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="guide_name" id="guide_name" required>
                                <option value="" disabled selected hidden>Select Guide</option>
                                @if (isset($guide_info))
                                    @foreach (@$guide_info as $gudie => $data)
                                        <option value="{{ @$gudie != null ? @$gudie : '' }}"
                                            {{ @$booking_data->guide_name == $gudie ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('guide_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Email <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="email" placeholder="nauloyatra@gmail.com"
                                value="{{ @$booking_data->email }}" name="email" id="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Number of People <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="4"
                                value="{{ @$booking_data->number_of_people }}" name="number_of_people"
                                id="number_of_people" required>
                            @error('number_of_people')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Total Amount <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="24000"
                                value="{{ @$booking_data->total_amount }}" name="total_amount"
                                id="total_amount" required>
                            @error('total_amount')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Advance Payment <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="4000"
                                value="{{ @$booking_data->advance_payment }}" name="advance_payment"
                                id="advance_payment" required>
                            @error('advance_payment')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="example-tel-input" class="form-control-label">Arrival Date <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="date" placeholder=""
                                value="{{ @$booking_data->arrival_date }}" name="arrival_date" id="arrival_date"
                                required>
                            @error('arrival_date')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Payment Status <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="payment_status" id="payment_status">
                                <option value="" disabled selected hidden>Select Payment Status</option>

                                <option {{ @$booking_data->payment_status == 'Unpaid' ? 'selected' : '' }}>Unpaid
                                </option>
                                <option {{ @$booking_data->payment_status == 'Paid' ? 'selected' : '' }}>Paid
                                </option>
                            </select>
                            @error('payment_status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Trip Status <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trip_status" id="trip_status">
                                <option value="" disabled selected hidden>Select Trip Status</option>

                                <option {{ @$booking_data->trip_status == 'Ongoing' ? 'selected' : '' }}>Ongoing
                                </option>
                                <option {{ @$booking_data->trip_status == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option {{ @$booking_data->trip_status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                            @error('trip_status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Contact Number<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="nauloyatra@gmail.com"
                                value="{{ @$booking_data->contact_number }}" name="contact_number"
                                id="contact_number" required>
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-1">
                            <label for="example-tel-input" class="form-control-label">Days<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="4"
                                value="{{ @$booking_data->days }}" name="days" id="days" required>
                            @error('days')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{ @$booking_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$booking_data->status == 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
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
