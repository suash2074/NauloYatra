@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('medicine.index') }}">Medicines</a>

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
                    <h3 class="mb-0 font-weight-bold">medicine details</h3>
                    <a class="nav-link " href="{{ route('medicine.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="illness_name" class="form-control-label">Illness Name</label>
                            <input class="form-control" type="text" placeholder="Name of illness" name="illness_name"
                                id="example-text-input" value="{{ @$medicine_data->illness_name }}" readonly>
                            @error('illness_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="medicine_name" class="form-control-label">Medicine Name</label>
                            <input class="form-control" type="text" placeholder="Name of medicine" name="medicine_name"
                                id="example-text-input" value="{{ @$medicine_data->medicine_name }}" readonly>
                            @error('medicine_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>



                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$medicine_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$medicine_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at"
                                id="example-text-input" value="{{ @$medicine_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at"
                                id="example-text-input" value="{{ @$medicine_data->updated_at }}" readonly>
                        </div>
                    </div>
                    {{-- <button type="submit" value="submit" class="btn btn-info float-right">Submit</button> --}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
