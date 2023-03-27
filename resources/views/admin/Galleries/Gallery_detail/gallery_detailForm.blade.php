@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('galleryDetail.index') }}">Galleries</a>

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
                        {{ isset($gallery_detail_data) ? 'Gallery Detail update Form' : 'Gallery Detail Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('galleryDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($gallery_detail_data))
                        <form action="{{ route('galleryDetail.update', @$gallery_detail_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('galleryDetail.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Image <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" value="" name="gallery_image"
                                id="gallery_image" required>
                            <div class="col-md-4">
                                <img src={{ asset('uploads/gallery/Thumb-' . @$gallery_detail_data->gallery_image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                            @error('gallery_image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Image Caption <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="image_caption" name="image_caption" rows="1">{{ @$gallery_detail_data->image_caption }}</textarea>
                                @error('image_caption')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Best Season <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="season" id="season">
                                <option {{ @$gallery_data->season == 'Spring' ? 'selected' : '' }}>Spring
                                </option>
                                <option {{ @$gallery_data->season == 'Summer' ? 'selected' : '' }}>Summer
                                </option>
                                <option {{ @$gallery_data->season == 'Autumn' ? 'selected' : '' }}>Autumn
                                </option>
                                <option {{ @$gallery_data->season == 'Winter' ? 'selected' : '' }}>Winter
                                </option>
                            </select>
                            @error('season')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{ @$gallery_detail_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$gallery_detail_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
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
