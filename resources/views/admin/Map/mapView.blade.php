@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('map.index') }}"> Map of
                the trek</a>
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
                    <h3 class="mb-0 font-weight-bold">{{ isset($map_data) ? 'Trek map update Form' : 'Trek map Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('map.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek Name</label>
                            <select class="form-control" name="trek_id" id="trek_id" readonly>
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$map_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label for="start_point" class="form-control-label">Start point</label>
                            <input class="form-control" type="text" placeholder="Starting point of the Trek "
                                name="start_point" id="start_point" value="{{ @$map_data->start_point }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="route_name" class="form-control-label">Route Name<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text"
                                placeholder="Format longitude, latitude: 85.3247, 27.6588" name="route_name"
                                id="route_name" value="{{ @$map_data->route_name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Path
                                    Coordinates</label>
                                <textarea class="form-control" id="path_coordinates" name="path_coordinates" rows="5" readonly>{{ @$map_data->path_coordinates }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status" readonly>
                                <option {{ @$map_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$map_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$map_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-6">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$map_data->updated_at }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
