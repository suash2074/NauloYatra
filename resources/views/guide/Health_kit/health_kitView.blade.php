@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('healthKit.index') }}">Health kits</a>

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
                    <h3 class="mb-0 font-weight-bold">Health kit details</h3>
                    <a class="nav-link " href="{{ route('healthKit.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Trek Name</label>
                            <select class="form-control" name="trek_id" id="trek_id" readonly>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$health_kit_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Medicine Name</label>
                            <select class="form-control" name="medicine_id" id="medicine_id" readonly>
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($medicine_info))
                                    @foreach (@$medicine_info as $medicine => $data)
                                        <option value="{{ @$medicine != null ? @$medicine : '' }}"
                                            {{ @$health_kit_data->medicine_id == $medicine ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>


                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$health_kit_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$health_kit_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at"
                                id="example-text-input" value="{{ @$health_kit_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at"
                                id="example-text-input" value="{{ @$health_kit_data->updated_at }}" readonly>
                        </div>
                    </div>
                    {{-- <button type="submit" value="submit" class="btn btn-info float-right">Submit</button> --}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
