@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.news.index') }}">News</a>

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
                    <h3 class="mb-0 font-weight-bold">{{ isset($news_data) ? 'News update Form' : 'News Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.news.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($news_data))
                        <form action="{{ route('guide.news.update', @$news_data->id) }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.news.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Headline <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Title of the news" name="headline"
                                id="headline" value="{{ @$news_data->headline }}" required>
                            @error('headline')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Short Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="short_description" rows="3">{{ @$news_data->short_description }}</textarea>
                                @error('short_description')
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
                                <img src={{ asset('uploads/news/Thumb-' . @$news_data->image) }} alt=""
                                    class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                            @error('image')
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
