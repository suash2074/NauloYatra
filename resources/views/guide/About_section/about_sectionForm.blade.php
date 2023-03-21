@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.about.index') }}">About
                Treks</a>

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
                        {{ isset($about_section_data) ? 'Trek about update Form' : 'Trek about Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.about.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($about_section_data))
                        <form action="{{ route('guide.about.update', @$about_section_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.about.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek Name<span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trek_id" id="trek_id">
                                <option value="" disabled selected hidden>Select Trek</option>

                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$about_section_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('trek_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="title" class="form-control-label">Title <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Best thing about trek something"
                                name="title" id="title" value="{{ @$about_section_data->title }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="description" rows="3">{{ @$about_section_data->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Image</label>
                            <input class="form-control" type="file" value="" name="image" id="image">
                            <div class="col-md-4">
                                <img src={{ asset('uploads/about_section/Thumb-' . @$about_section_data->image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-8">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Note</label>
                                <textarea class="form-control" id="note" name="note" rows="1">{{ @$about_section_data->note }}</textarea>
                                @error('note')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('guide.culture.create') }}" class="btn btn-warning"
                        onclick="return confirm('Are you sure you want to skip this part !!');">
                        Skip
                    </a>
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
