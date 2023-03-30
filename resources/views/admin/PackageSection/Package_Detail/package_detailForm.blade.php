@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('packageDetail.index') }}">Packages</a>

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
                        {{ isset($package_detail_data) ? 'Package details update Form' : 'Package details Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('packageDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($package_detail_data))
                        <form action="{{ route('packageDetail.update', @$package_detail_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('packageDetail.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Package Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="package_id" id="package_id" required>
                                <option value="" disabled selected hidden>Select Package</option>
                                @if (isset($package_info))
                                    @foreach (@$package_info as $package => $data)
                                        <option value="{{ @$package != null ? @$package : '' }}"
                                            {{ @$package_detail_data->package_id == $package ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('package_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- <div class="row d-flex justify-content-between"> --}}
                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Trek type <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trek_type" id="trek_type">
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
                            @error('trek_type')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="example-tel-input" class="form-control-label">Days <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="10"
                                value="{{ @$package_detail_data->days }}" name="days" id="days">
                            @error('days')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="example-tel-input" class="form-control-label">Price Per person <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="Rs 1600"
                                value="{{ @$package_detail_data->price_per_person }}" name="price_per_person"
                                id="price_per_person">
                            @error('price_per_person')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Category <span
                                class="text-danger">*</span></label>
                            <select class="form-control" name="category" id="category">
                                <option {{ @$package_detail_data->category == 'Basic' ? 'selected' : '' }} Name="Basic">Basic
                                </option>
                                <option {{ @$package_detail_data->category == 'Standard' ? 'selected' : '' }} Name="Standard">Standard
                                </option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Details <span
                                    class="text-danger">*</span> <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="details" rows="3">{{ @$package_detail_data->details }}</textarea>
                                @error('details')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-8">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Link</label>
                                <textarea class="form-control" id="link" name="link" rows="1">{{ @$package_detail_data->link }}</textarea>
                                @error('link')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
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
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
