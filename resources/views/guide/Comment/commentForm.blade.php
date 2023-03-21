@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('comment.index') }}">Comments</a>

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
                    <h3 class="mb-0 font-weight-bold">{{ isset($comment_data) ? 'Comment update Form' : 'Comment Form' }}
                    </h3>
                    <a class="nav-link " href="{{ route('comment.index') }}">
                        <i class="ni ni-bold-left text-orange"></i> Back
                    </a>
                </div>
                <div class="container mb-4">
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    @if (isset($comment_data))
                        <form action="{{ route('comment.update', @$comment_data->id) }}" method="post" class="form"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                        @else
                            <form action="{{ route('comment.store') }}" method="post" class="form"
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
                                            {{ @$comment_data->trek_id == $trek ? 'selected' : '' }}>
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
                            <label for="example-password-input" class="form-control-label">User Name <span
                                class="text-danger">*</span></label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="" disabled selected hidden>Select User</option>

                                @if (isset($user_info))
                                    @foreach (@$user_info as $user => $data)
                                        <option value="{{ @$user != null ? @$user : '' }}"
                                            {{ @$comment_data->user_id == $user ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Text <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="summernote" name="text" rows="3">{{ @$comment_data->text }}</textarea>
                                @error('text')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option {{ @$comment_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$comment_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" value="submit" class="btn btn-info float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
