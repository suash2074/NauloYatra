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

            @include('admin.adminInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">Booking table</h3>
                                <a class="nav-link " href="{{ route('booking.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> Booking
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">User Nmae</th>
                                            <th scope="col">Guide Name</th>
                                            <th scope="col">Trek Name</th>
                                            <th scope="col">Arrival Date</th>
                                            <th scope="col">Advance Paid</th>
                                            <th scope="col">Trek Status</th>
                                            <th scope="col">Payment Status</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($booking_data))
                                            @foreach ($booking_data as $bookings => $booking)
                                                <tr>
                                                    <td>{{ $bookings + 1 }}</td>

                                                    <td>
                                                        @if (isset($booking->user_info['username']))
                                                            {{ $booking->user_info['username'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if (isset($booking->guide_info['username']))
                                                            {{ $booking->guide_info['username'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if (isset($booking->trek_info['trek_name']))
                                                            {{ $booking->trek_info['trek_name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>{{ $booking->arrival_date }}</td>

                                                    <td>{{ $booking->advance_payment }}</td>

                                                    <td>{{ $booking->trip_status }}</td>

                                                    <td class="{{ @$booking->payment_status == 'Paid' ? 'text-success' : 'text-warning' }}">{{ $booking->payment_status }}</td>

                                                    <td>{{ $booking->status }}</td>

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
                                                                    href="{{ route('booking.edit', $booking->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('booking.show', $booking->id) }}">View</a>
                                                                <form
                                                                    action="{{ route('booking.destroy', $booking->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure about deleting this booking..!');"
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
                                        {{ $booking_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.adminInclude.footer')
