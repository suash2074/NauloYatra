@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('guide.newsDetail.index') }}">News</a>

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
                    <h3 class="mb-0 font-weight-bold">{{ isset($news_detail_data) ? 'News details update Form' : 'News details Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.newsDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($news_detail_data))
                        <form action="{{ route('guide.newsDetail.update', @$news_detail_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.newsDetail.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Headline  <span
                                class="text-danger">*</span></label>
                            <select class="form-control" name="news_id" id="news_id" required>
                                <option value="" disabled selected hidden>Select Headline</option>
                                @if (isset($news_info))
                                    @foreach (@$news_info as $news => $data)
                                        <option value="{{ @$news != null ? @$news : '' }}"
                                            {{ @$news_detail_data->news_id == $news ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('news_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="sub_headline" class="form-control-label">Sub Headline <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="Best thing newsDetail trek something"
                                name="sub_headline" id="sub_headline" value="{{ @$news_detail_data->sub_headline }}" required>
                            @error('sub_headline')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="description" rows="3">{{ @$news_detail_data->description }}</textarea>
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
                                <img src={{ asset('uploads/news_detail/Thumb-' . @$news_detail_data->image) }}
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
                                <label for="exampleFormControlTextarea1">Link</label>
                                <textarea class="form-control" id="link" name="link" rows="1">{{ @$news_detail_data->link }}</textarea>
                                @error('link')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
