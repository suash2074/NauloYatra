@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('guide.map.index') }}">
                Map of
                the trek</a>
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
                    <h3 class="mb-0 font-weight-bold">{{ isset($map_data) ? 'Trek map update Form' : 'Trek map Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.map.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($map_data))
                        <form action="{{ route('guide.map.update', @$map_data->id) }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.map.store') }}" method="post" class="form"
                                enctype="multipart/form-data">
                                @csrf
                    @endif
                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-3">
                            <label for="example-password-input" class="form-control-label">Trek Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="trek_id" id="trek_id">
                                <option value="" disabled selected hidden>Select Trek</option>
                                @if (isset($trek_info))
                                    @foreach (@$trek_info as $trek => $data)
                                        <option value="{{ @$trek != null ? @$trek : '' }}"
                                            {{ @$map_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('trek_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-6">
                            <label for="start_point" class="form-control-label">Start point<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text"
                                placeholder="Format: longitude, latitude: 85.3247, 27.6588" name="start_point"
                                id="start_point" value="{{ @$map_data->start_point }}" required>
                            @error('start_point')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label for="route_name" class="form-control-label">Route Name<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="text" placeholder="eg: Pokhara to Kathmandu"
                                name="route_name" id="route_name" value="{{ @$map_data->route_name }}" required>
                            @error('route_name')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label class="form-control-label" for="exampleFormControlTextarea1">Path
                                    Coordinates</label>
                                <textarea class="form-control" id="path_coordinates" name="path_coordinates"
                                    placeholder="Format: [longitude, latitude]: [85.3247, 27.6588], [87.3247, 24.6588], [93.3247, 30.6588]"
                                    rows="5">{{ @$map_data->path_coordinates }}</textarea>
                                @error('path_coordinates')
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
