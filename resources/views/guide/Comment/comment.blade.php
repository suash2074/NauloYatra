@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('comment.index') }}">Comments</a>

            @include('admin.adminInclude.topNav')

            @include('admin.adminInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">Comment table</h3>
                               
                               <!-- Form for searching-->
                               <form action="" class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                <div class="form-group mb-0">
                                    <div class="input-group input-group-alternative border-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input class="form-control h-25"
                                            placeholder="Search by text" type="search"
                                            name="search" value="{{ $search }}" />
                                    </div>
                                </div>
                            </form>
                               
                                <a class="nav-link " href="{{ route('comment.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> Comment
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Trek Name</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Text</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($comment_data))
                                            @foreach ($comment_data as $comments => $comment)
                                                <tr>
                                                    <td>{{ $comments + 1 }}</td>

                                                    <td>
                                                        @if (isset($comment->trek_info['trek_name']))
                                                            {{ $comment->trek_info['trek_name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if (isset($comment->user_info['first_name']))
                                                            {{ $comment->user_info['first_name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>{!! html_entity_decode( Str::limit($comment->text, 30)) !!}</td>


                                                    <td>{{ $comment->status }}</td>

                                                    <td class="text-right d-flex">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light"
                                                                href="#" role="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('comment.edit', $comment->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('comment.show', $comment->id) }}">View</a>
                                                                <form
                                                                    action="{{ route('comment.destroy', $comment->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure about deleting this comment..!');"
                                                                        href="#">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination d-flex justify-content-between mb-0">
                                        {{ $comment_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.adminInclude.footer')
