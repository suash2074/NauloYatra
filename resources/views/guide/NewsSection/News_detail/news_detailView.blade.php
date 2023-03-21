@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.newsDetail.index') }}">News</a>

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
                    <h3 class="mb-0 font-weight-bold">News Details
                    </h3>
                    <a class="nav-link " href="{{ route('guide.newsDetail.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Headline</label>
                            <select class="form-control" name="news_id" id="news_id" readonly>
                                <option value="" disabled selected hidden>Select Headline</option>

                                @if (isset($news_info))
                                    @foreach (@$news_info as $news => $data)
                                        <option value="{{ @$news != null ? @$news : '' }}"
                                            {{ @$news_detail_data->news_id == $news ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="sub_headline" class="form-control-label">Sub Headline</label>
                            <input class="form-control" type="text"
                                placeholder="Best thing newsDetail trek something" name="sub_headline" id="sub_headline"
                                readonly value="{{ @$news_detail_data->sub_headline }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ @$news_detail_data->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Image</label>
                            <input class="form-control" type="file" value="" name="image" id="image"
                                readonly>
                            <div class="col-md-4">
                                <img src={{ asset('uploads/news_detail/Thumb-' . @$news_detail_data->image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-8">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Link</label>
                                <textarea class="form-control" id="link" name="link" rows="1" readonly>{{ @$news_detail_data->link }}</textarea>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$news_detail_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$news_detail_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$news_data_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$news_data_data->updated_at }}" readonly>
                        </div>
                    </div>
                    {{-- <button type="submit" value="submit" class="btn btn-info float-right">Submit</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@include('guide.guideInclude.footer')
