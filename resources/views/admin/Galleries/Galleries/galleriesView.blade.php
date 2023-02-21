@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('gallery.index') }}">Galleries</a>

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
                    <h3 class="mb-0 font-weight-bold">Gallery Detail</h3>
                    <a class="nav-link " href="{{ route('gallery.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Trek Name</label>
                            <select class="form-control" name="trek_id" id="trek_id" readonly>
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$gallery_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Medicine Name</label>
                            <select class="form-control" name="gallery_detail_id" id="gallery_detail_id" readonly>
                                <option value="" disabled selected hidden>Select Gallery Caption</option>
                                @if (isset($gallery_info))
                                    @foreach (@$gallery_info as $gallery => $data)
                                        <option value="{{ @$gallery != null ? @$gallery : '' }}"
                                            {{ @$gallery_data->gallery_detail_id == $gallery ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$gallery_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$gallery_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at"
                                id="example-text-input" value="{{ @$gallery_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at"
                                id="example-text-input" value="{{ @$gallery_data->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
