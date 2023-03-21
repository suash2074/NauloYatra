@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.gallery.index') }}">Galleries</a>

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
                        {{ isset($gallery_data) ? 'Gallery update Form' : 'Gallery Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.gallery.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($gallery_data))
                        <form action="{{ route('guide.gallery.update', @$gallery_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.gallery.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Trek Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trek_id" id="trek_id">
                                <option value="" disabled selected hidden>Select Trek</option>

                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$gallery_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('trek_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Caption <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="gallery_detail_id" id="gallery_detail_id">
                                <option value="" disabled selected hidden>Select Gallery Caption</option>

                                @if (isset($gallery_info))
                                    @foreach (@$gallery_info as $gallery => $data)
                                        <option value="{{ @$gallery != null ? @$gallery : '' }}"
                                            {{ @$gallery_data->gallery_detail_id == $gallery ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('gallery_detail_id')
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
