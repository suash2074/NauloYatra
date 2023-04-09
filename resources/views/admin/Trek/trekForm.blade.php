@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('trek.index') }}">Treks</a>

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
                    <h3 class="mb-0 font-weight-bold">{{ isset($trek_data) ? 'Trek update Form' : 'Trek Form' }}</h3>
                    <a class="nav-link " href="{{ route('trek.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($trek_data))
                        <form action="{{ route('trek.update', @$trek_data->id) }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('trek.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="trek_name" class="form-control-label">Trek Name <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Name of the trek" name="trek_name"
                                id="trek_name" value="{{ @$trek_data->trek_name }}" required>
                            @error('trek_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Background Image <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" value="" name="background_image"
                                id="background_image">
                            <div class="col-md-4">
                                <img src={{ asset('uploads/trek/Thumb-' . @$trek_data->background_image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                            @error('background_image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-tel-input" class="form-control-label">Duration <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="12"
                                value="{{ @$trek_data->duration }}" name="duration" id="duration">
                            @error('duration')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="example-tel-input" class="form-control-label">Average Budget <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" placeholder="Rs 1600"
                                value="{{ @$trek_data->average_budget }}" name="average_budget" id="average_budget"
                                required>
                            @error('average_budget')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek type <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trek_type" id="trek_type">
                                <option value="" disabled selected hidden>Select Trek type</option>

                                <option {{ @$trek_data->trek_type == 'Tea-House-Trek' ? 'selected' : '' }}>
                                    Tea-House-Trek
                                </option>
                                <option {{ @$trek_data->trek_type == 'Camping-Trekking' ? 'selected' : '' }}>
                                    Camping-Trekking
                                </option>
                                <option {{ @$trek_data->trek_type == 'Gap-Trek' ? 'selected' : '' }}>Gap-Trek
                                </option>
                            </select>
                            @error('trek_type')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Track difficulty <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="track_difficulty" id="track_difficulty">
                                <option value="" disabled selected hidden>Select Difficulty</option>
                                <option {{ @$trek_data->track_difficulty == 'Easy' ? 'selected' : '' }}>Easy
                                </option>
                                <option {{ @$trek_data->track_difficulty == 'Moderate' ? 'selected' : '' }}>Moderate
                                </option>
                                <option {{ @$trek_data->track_difficulty == 'Difficult' ? 'selected' : '' }}>Difficult
                                </option>
                            </select>
                            @error('track_difficulty')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Best Season </label>
                            <select class="form-control" name="best_season" id="best_season">
                                <option value="" disabled selected hidden>Select Season</option>
                                <option {{ @$trek_data->best_season == 'Spring' ? 'selected' : '' }}>Spring
                                </option>
                                <option {{ @$trek_data->best_season == 'Summer' ? 'selected' : '' }}>Summer
                                </option>
                                <option {{ @$trek_data->best_season == 'Autumn' ? 'selected' : '' }}>Autumn
                                </option>
                                <option {{ @$trek_data->best_season == 'Winter' ? 'selected' : '' }}>Winter
                                </option>
                            </select>
                            @error('best_season')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{ @$trek_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option {{ @$trek_data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
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
