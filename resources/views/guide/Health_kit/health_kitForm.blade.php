@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.healthKit.index') }}">Health Kits</a>

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
                        {{ isset($health_kit_data) ? 'Health kit update Form' : 'Health kit Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('guide.healthKit.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($health_kit_data))
                        <form action="{{ route('guide.healthKit.update', @$health_kit_data->id) }}" method="post"
                            class="form" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('guide.healthKit.store') }}" method="post" class="form"
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
                                            {{ @$health_kit_data->trek_id == $trek ? 'selected' : '' }}>
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
                            <label for="example-password-input" class="form-control-label">Medicine Name <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="medicine_id" id="medicine_id">
                                <option value="" disabled selected hidden>Select Medicine</option>

                                @if (isset($medicine_info))
                                    @foreach (@$medicine_info as $medicine => $data)
                                        <option value="{{ @$medicine != null ? @$medicine : '' }}"
                                            {{ @$health_kit_data->medicine_id == $medicine ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>

                            @error('medicine_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   
                    <a href="{{ route('guide.healthKit.index') }}" class="btn btn-warning"
                        onclick="return confirm('Are you sure you want to skip this part !!');">
                        Skip
                    </a>
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('guide.guideInclude.footer')
