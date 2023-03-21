@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.gallery.index') }}">Galleries</a>

            @include('guide.guideInclude.topNav')

            @include('guide.guideInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">Gallery table</h3>
                                <a class="nav-link " href="{{ route('guide.gallery.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> Gallery
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Trek Name</th>
                                            <th scope="col">Gallery Image</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($gallery_data))
                                            @foreach ($gallery_data as $galleries => $gallery)
                                                <tr>
                                                    <td>{{ $galleries + 1 }}</td>

                                                    <td>
                                                        @if (isset($gallery->trek_info['trek_name']))
                                                            {{ $gallery->trek_info['trek_name'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="avatar-group">
                                                            <a href="#" class="" data-toggle="tooltip">
                                                                <img alt="Image placeholder"
                                                                    src="{{ asset('uploads/gallery/Thumb-' . $gallery->gallery_info['gallery_image']) }}"
                                                                    class="rounded-circle"
                                                                    style="height:90px; width:90px">
                                                            </a>
                                                        </div>
                                                    </td>


                                                    <td>{{ $gallery->status }}</td>

                                                    <td class="text-right">
                                                        <div class="dropdown d-flex align-items-center">
                                                            <a class="btn btn-sm btn-icon-only text-light"
                                                                href="#" role="button" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('guide.gallery.edit', $gallery->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('guide.gallery.show', $gallery->id) }}">View</a>
                                                                <form
                                                                    action="{{ route('guide.gallery.destroy', $gallery->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure about deleting this user..!');"
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
                                        {{ $gallery_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('guide.guideInclude.footer')
