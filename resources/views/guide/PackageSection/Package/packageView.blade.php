@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.package.index') }}">Packages</a>

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
                    <h3 class="mb-0 font-weight-bold">Packages Details
                    </h3>
                    <a class="nav-link " href="{{ route('guide.package.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">

                    <div class="row">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek</label>
                            <select class="form-control" name="trek_id" id="trek_id" readonly>
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$package_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$package_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$package_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="package_name" class="form-control-label">Package Name</label>
                            <input class="form-control" type="text" placeholder="Name of the package" name="package_name"
                                id="package_name" value="{{ @$package_data->package_name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$package_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$package_data->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
