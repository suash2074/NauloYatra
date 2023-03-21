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
                    <h3 class="mb-0 font-weight-bold">Comment Details
                    </h3>
                    <a class="nav-link " href="{{ route('comment.index') }}">
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
                                            {{ @$comment_data->trek_id == $trek ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-5">
                            <label for="example-password-input" class="form-control-label">User Name</label>
                            <select class="form-control" name="user_id" id="user_id" readonly>
                                <option value="" disabled selected hidden>Select User</option>
                                @if (isset($user_info))
                                    @foreach (@$user_info as $user => $data)
                                        <option value="{{ @$user != null ? @$user : '' }}"
                                            {{ @$comment_data->user_id == $user ? 'selected' : '' }}>
                                            {{ @$data }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Tetx <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="text" name="text" rows="3" readonly>{{ @$comment_data->text }}</textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row d-flex justify-content-between">
                        <div class="form-group col-4">
                            <label for="trek_name" class="form-control-label">Created at</label>
                            <input class="form-control" type="text" name="created_at" id="example-text-input"
                                value="{{ @$comment_data->created_at }}" readonly>
                        </div>

                        <div class="form-group col-4">
                            <label for="trek_name" class="form-control-label">Updated at</label>
                            <input class="form-control" type="text" name="updated_at" id="example-text-input"
                                value="{{ @$comment_data->updated_at }}" readonly>
                        </div>

                        <div class="form-group col-4">
                            <label for="example-password-input" class="form-control-label">Status</label>
                            <select class="form-control" name="status" id="status"readonly>
                                <option {{ @$comment_data->status == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option {{ @$comment_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin.adminInclude.footer')
