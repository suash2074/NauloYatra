@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('galleryDetail.index') }}">Galleries</a>

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
                    <h3 class="mb-0 font-weight-bold">Image Detail</h3>
                    <a class="nav-link " href="{{ route('galleryDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Image</label>
                            <input class="form-control" type="file" value="" name="gallery_image" id="gallery_image" readonly>
                            <div class="col-md-4">
                                <img src={{ asset('uploads/gallery/Thumb-' . @$gallery_detail_data->gallery_image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Image Caption</label>
                                <textarea class="form-control" id="image_caption" name="image_caption" rows="1" readonly>{{ @$gallery_detail_data->image_caption }}</textarea>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Best Season</label>
                            <select class="form-control" name="best_season" id="best_season" readonly>
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
                    
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$gallery_detail_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$gallery_detail_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$gallery_detail_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$gallery_detail_data->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
