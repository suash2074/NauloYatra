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
                    <h3 class="mb-0 font-weight-bold">{{ isset($medicine_data) ? 'Medicine update Form' : 'Medicine Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('medicine.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($medicine_data))
                        <form action="{{ route('medicine.update', @$medicine_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('medicine.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="illness_name" class="form-control-label">Illness Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Name of illness" name="illness_name"
                                id="example-text-input" value="{{ @$medicine_data->illness_name }}" required>
                            @error('illness_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="medicine_name" class="form-control-label">Medicine Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Name of medicine" name="medicine_name"
                                id="example-text-input" value="{{ @$medicine_data->medicine_name }}" required>
                            @error('medicine_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{ @$medicine_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$medicine_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <a href="{{ route('healthKit.create') }}" class="btn btn-warning"
                        onclick="return confirm('Are you sure you want to skip this part !!');">
                        Skip
                    </a>
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
