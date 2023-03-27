@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.packageDetail.index') }}">Packages</a>

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
                    <h3 class="mb-0 font-weight-bold">Package Details</h3>
                    <a class="nav-link " href="{{ route('guide.packageDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Package Name</label>
                            <select class="form-control" name="package_id" id="package_id" readonly>
                                <option value="" disabled selected hidden>Select Package</option>
                                @if (isset($package_info))
                                    @foreach (@$package_info as $package => $data)
                                        <option value="{{ @$package != null ? @$package : '' }}"
                                            {{ @$package_detail_data->package_id == $package ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        {{-- <div class="row d-flex justify-content-between"> --}}
                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Trek type</label>
                            <select class="form-control" name="trek_type" id="trek_type" readonly>
                                <option {{ @$package_detail_data->trek_type == 'Tea House Trek' ? 'selected' : '' }}>
                                    Tea House
                                    Trek
                                </option>
                                <option {{ @$package_detail_data->trek_type == 'Camping Trekking' ? 'selected' : '' }}>
                                    Camping
                                    Trekking
                                </option>
                                <option {{ @$package_detail_data->trek_type == 'Gap Trek' ? 'selected' : '' }}>Gap
                                    Trek
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="example-tel-input" class="form-control-label">Days</label>
                            <input class="form-control" type="number" placeholder="Rs 1400"
                                value="{{ @$package_detail_data->days }}" name="days" id="days" readonly>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="example-tel-input" class="form-control-label">Price Per person</label>
                            <input class="form-control" type="number" placeholder="Rs 1600"
                                value="{{ @$package_detail_data->price_per_person }}" name="price_per_person"
                                id="price_per_person" readonly>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Category</label>
                            <select class="form-control" name="category" id="category" readonly>
                                <option {{ @$package_detail_data->category == 'Basic' ? 'selected' : '' }} Name="Basic">Basic
                                </option>
                                <option {{ @$package_detail_data->category == 'Standard' ? 'selected' : '' }} Name="Standard">Standard
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Details</label>
                                <textarea class="form-control" id="details" name="details" rows="3" readonly>{{ @$package_detail_data->details }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-8">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Link</label>
                                <textarea class="form-control" id="link" name="link" rows="1" readonly>{{ @$package_detail_data->link }}</textarea>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$package_detail_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$package_detail_data->status == 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$package_detail_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$package_detail_data->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
