@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.booking.index') }}">Bookings</a>

            @include('guide.guideInclude.topNav')

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
                        Bookings Details
                    </h3>
                    <a class="nav-link " href="{{ route('guide.booking.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">User Name</label>
                            <select class="form-control" name="user_id" id="user_id" readonly>
                                <option value="" disabled selected hidden>Select User</option>
                                @if (isset($user_info))
                                    @foreach (@$user_info as $user => $data)
                                        <option value="{{ @$user != null ? @$user : '' }}"
                                            {{ @$booking_data->user_id == $user ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Package Name</label>
                            <select class="form-control" name="package_id" id="package_id" readonly>
                                <option value="" disabled selected hidden>Select Package</option>
                                @if (isset($package_info))
                                    @foreach (@$package_info as $package => $data)
                                        <option value="{{ @$package != null ? @$package : '' }}"
                                            {{ @$booking_data->package_id == $package ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Trek Name</label>
                            <select class="form-control" name="trek_id" id="trek_id" readonly>
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$booking_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Guide Name</label>
                            <select class="form-control" name="guide_name" id="guide_name" readonly>
                                <option value="" disabled selected hidden>Select Guide</option>
                                @if (isset($guide_info))
                                    @foreach (@$guide_info as $gudie => $data)
                                        <option value="{{ @$gudie != null ? @$gudie : '' }}"
                                            {{ @$booking_data->guide_name == $gudie ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Email</label>
                            <input class="form-control" type="email" placeholder="nauloyatra@gmail.com"
                                value="{{ @$booking_data->email }}" name="email" id="email" readonly>
                        </div>

                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Number of People <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="4"
                                value="{{ @$booking_data->number_of_people }}" name="number_of_people"
                                id="number_of_people" readonly>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Total Amount</label>
                            <input class="form-control" type="number" placeholder="24000"
                                value="{{ @$booking_data->total_amount }}" name="total_amount"
                                id="total_amount" readonly>
                        </div>

                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Advance Payment </label>
                            <input class="form-control" type="number" placeholder="4000"
                                value="{{ @$booking_data->advance_payment }}" name="advance_payment"
                                id="advance_payment" readonly>
                        </div>
                    </div>
                    
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="example-tel-input" class="form-control-label">Arrival Date</label>
                            <input class="form-control" type="date" placeholder=""
                                value="{{ @$booking_data->arrival_date }}" name="arrival_date" id="arrival_date"
                                readonly>
                        </div>

                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Payment Status</label>
                            <select class="form-control" name="payment_status" id="payment_status" readonly>
                                <option {{ @$booking_data->payment_status == 'Paid' ? 'selected' : '' }}>Paid
                                </option>
                                <option {{ @$booking_data->payment_status == 'Unpaid' ? 'selected' : '' }}>
                                    Unpaid
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Trip Status</label>
                            <select class="form-control" name="trip_status" id="trip_status" readonly>
                                <option {{ @$booking_data->trip_status == 'Ongiong' ? 'selected' : '' }}>Ongiong
                                </option>
                                <option {{ @$booking_data->trip_status == 'Completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option {{ @$booking_data->trip_status == 'Cancelled' ? 'selected' : '' }}>Cancelled
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="example-tel-input" class="form-control-label">Contact Number</label>
                            <input class="form-control" type="text" placeholder="nauloyatra@gmail.com"
                                value="{{ @$booking_data->contact_number }}" name="contact_number"
                                id="contact_number" readonly>
                        </div>

                        <div class="form-group col-1">
                            <label for="example-tel-input" class="form-control-label">Days</label>
                            <input class="form-control" type="number" placeholder="4"
                                value="{{ @$booking_data->days }}" name="days" id="days" readonly>
                        </div>
                        <div class="form-group col-2"></div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-5">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$booking_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-5">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$booking_data->updated_at }}" readonly>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-7">
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
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

                        <div class="form-group col-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
