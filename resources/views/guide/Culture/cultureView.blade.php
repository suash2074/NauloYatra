@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('culture.index') }}">Cultures encounteerd on trek</a>

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
                    <a class="nav-link " href="{{ route('culture.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek Name</label>
                            <select class="form-control" name="trek_id" id="trek_id" readonly>
                                @if (isset($trek_info))
                                @foreach (@$trek_info as $trek => $data)
                                    <option value="{{ @$trek != null ? @$trek : '' }}"
                                        {{ @$culture_data->trek_id == $trek ? 'selected' : '' }}>
                                        {{ @$data }}</option>
                                @endforeach
                            @endif
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Title</label>
                            <input class="form-control" type="text" placeholder="Best thing culture trek something"
                                name="title" id="title" value="{{ @$culture_data->title }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" readonly>{{ @$culture_data->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="example-text-input" class="form-control-label">Image</label>
                            <input class="form-control" type="file" value="" name="image" id="image"
                                readonly>
                            <div class="col-md-4">
                                <img src={{ asset('uploads/culture/Thumb-' . @$culture_data->image) }}
                                    alt="" class="img img-fluid img-responsive" style="max-width: 10rem">
                            </div>
                        </div>
                    </div>

                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-8">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Note</label>
                                <textarea class="form-control" id="note" name="note" rows="1" readonly>{{ @$culture_data->note }}</textarea>
                            </div>
                        </div>

                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$culture_data->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option {{ @$culture_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" placeholder="Name of the trek"
                                name="created_at" id="example-text-input" value="{{ @$culture_data->created_at }}"
                                readonly>
                            @error('created_at')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" placeholder="Name of the trek"
                                name="updated_at" id="example-text-input" value="{{ @$culture_data->updated_at }}"
                                readonly>
                            @error('updated_at')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <button type="submit" value="submit" class="btn btn-info float-right">Submit</button> --}}
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
