@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.galleryDetail.index') }}">Galleries</a>

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
                    <h3 class="mb-0 font-weight-bold">
                        {{ isset($gallery_detail_data) ? 'Gallery Detail update Form' : 'Gallery Detail Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.galleryDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($gallery_detail_data))
                        <form action="{{ route('guide.galleryDetail.update', @$gallery_detail_data->id) }}"
                            method="post" class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.galleryDetail.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Image <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="file" value="" name="gallery_image"
                                id="gallery_image">
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

                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
