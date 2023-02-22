@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('trek.index') }}">Treks</a>

            @include('admin.adminInclude.topNav')

            @include('admin.adminInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">Trek table</h3>

                                <!-- Form for searching-->
                                <form action=""
                                    class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative border-0" >
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control h-25" placeholder="Search by trek name, season or type" type="search" name="search" value="{{ $search }}"/>
                                        </div>
                                    </div>
                                </form>

                                <a class="nav-link " href="{{ route('trek.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> Trek
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table id="#" class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Trek name</th>
                                            <th scope="col">Trek type</th>
                                            <th scope="col">Best season</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($trek_data))
                                            @foreach ($trek_data as $treks => $trek)
                                                <tr>
                                                    <td>{{ $treks + 1 }}</td>

                                                    <td>
                                                        @if (isset($trek->user_info['username']))
                                                            {{ $trek->user_info['username'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>{{ $trek->trek_name }}</td>

                                                    <td>{{ $trek->trek_type }}</td>

                                                    <td>{{ $trek->best_season }}</td>

                                                    <td>{{ $trek->status }}</td>

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
                                                                    href="{{ route('trek.edit', $trek->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('trek.show', $trek->id) }}">View</a>
                                                                <form action="{{ route('trek.destroy', $trek->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure about deleting this trek..!');"
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
                                        {{$trek_data->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin.adminInclude.footer')
