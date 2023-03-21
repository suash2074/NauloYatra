@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('guide.healthKit.index') }}">Health Kits</a>

            @include('guide.guideInclude.topNav')

            @include('guide.guideInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">Health Kit table</h3>
                                <a class="nav-link " href="{{ route('guide.healthKit.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> Health Kit
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Trek Name</th>
                                            <th scope="col">Medicine Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($health_kit_data))
                                            @foreach ($health_kit_data as $health_kits => $health_kit)
                                                <tr>
                                                    <td>{{ $health_kits + 1 }}</td>

                                                    <td>
                                                        @if (isset($health_kit->trek_info['trek_name']))
                                                            {{ $health_kit->trek_info['trek_name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if (isset($health_kit->medicine_info['medicine_name']))
                                                            {{ $health_kit->medicine_info['medicine_name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>


                                                    <td>{{ $health_kit->status }}</td>

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
                                                                    href="{{ route('guide.healthKit.edit', $health_kit->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('guide.healthKit.show', $health_kit->id) }}">View</a>
                                                                <form
                                                                    action="{{ route('guide.healthKit.destroy', $health_kit->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure about deleting this health kit..!');"
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
                                        {{ $health_kit_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('guide.guideInclude.footer')
