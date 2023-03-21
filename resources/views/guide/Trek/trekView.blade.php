@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.trek.index') }}">Treks</a>

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
                    <h3 class="mb-0 font-weight-bold">Trek details</h3>
                    <a class="nav-link " href="{{ route('guide.trek.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="trek_name" class="form-control-label">Trek Name</label>
                            <input class="form-control" type="text" placeholder="Name of the trek" name="trek_name"
                                id="example-text-input" value="{{ @$trek_data->trek_name }}" readonly>
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
                                id="background_image" readonly>
                            <div class="col-md-4">
                                <img src={{ asset('uploads/user/Thumb-' . @$trek_data->background_image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                            @error('background_image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-tel-input" class="form-control-label">Duration</label>
                            <input class="form-control" type="number" placeholder="Rs 1600"
                                value="{{ @$trek_data->duration }}" name="duration" id="duration" readonly>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="example-tel-input" class="form-control-label">Average Budget</label>
                            <input class="form-control" type="number" placeholder="Rs 1600"
                                value="{{ @$trek_data->average_budget }}" name="average_budget" id="average_budget"
                                readonly>
                            @error('average_budget')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek type</label>
                            <select class="form-control" name="trek_type" id="trek_type" readonly>
                                <option {{ @$trek_data->trek_type == 'Tea House Trek' ? 'selected' : '' }}>Tea House
                                    Trek
                                </option>
                                <option {{ @$trek_data->trek_type == 'Camping Trekking' ? 'selected' : '' }}>Camping
                                    Trekking
                                </option>
                                <option {{ @$trek_data->trek_type == 'Gap Trek' ? 'selected' : '' }}>Gap Trek
                                </option>
                            </select>
                            @error('trek_type')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Track difficulty</label>
                            <select class="form-control" name="track_difficulty" id="track_difficulty" readonly>
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
                            <label for="example-password-input" class="form-control-label">Best Season</label>
                            <select class="form-control" name="best_season" id="best_season" readonly>
                                <option {{ @$trek_data->best_season == 'Spring' ? 'selected' : '' }}>Spring
                                </option>
                                <option {{ @$trek_data->best_season == 'Summer' ? 'selected' : '' }}>Moserate
                                </option>
                                <option {{ @$trek_data->best_season == 'Autumn' ? 'selected' : '' }}>Autumn
                                </option>
                                <option {{ @$trek_data->best_season == 'Winter' ? 'selected' : '' }}>Winter
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$trek_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option {{ @$trek_data->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" 
                                name="created_at" id="example-text-input" value="{{ @$trek_data->created_at }}"
                                readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text"
                                name="updated_at" id="example-text-input" value="{{ @$trek_data->updated_at }}"
                                readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
