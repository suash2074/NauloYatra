@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.galleryDetail.index') }}">Galleries</a>

            @include('guide.guideInclude.topNav')

            @include('guide.guideInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">Gallery detail table</h3>


                                <!-- Form for searching-->
                                <form action="" class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative border-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control h-25" placeholder="Search by caption or season"
                                                type="search" name="search" value="{{ $search }}" />
                                        </div>
                                    </div>
                                </form>


                                <a class="nav-link " href="{{ route('guide.galleryDetail.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> Gallery
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Gallery Image</th>
                                            <th scope="col">Caption</th>
                                            <th scope="col">Season</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($gallery_detail_data))
                                            @foreach ($gallery_detail_data as $gallery_details => $gallery_detail)
                                                <tr>
                                                    <td>{{ $gallery_details + 1 }}</td>

                                                    <td>
                                                        <div class="avatar-group">
                                                            <a href="#" class="" data-toggle="tooltip">
                                                                <img alt="Image placeholder"
                                                                    src="{{ asset('uploads/gallery/Thumb-' . $gallery_detail->gallery_image) }}"
                                                                    class="rounded-circle"
                                                                    style="height:90px; width:90px">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    </td>

                                                    <td>{{ $gallery_detail->image_caption }}</td>

                                                    <td>{{ $gallery_detail->season }}</td>

                                                    <td>{{ $gallery_detail->status }}</td>

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
                                                                    href="{{ route('guide.galleryDetail.edit', $gallery_detail->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('guide.galleryDetail.show', $gallery_detail->id) }}">View</a>
                                                                <form
                                                                    action="{{ route('guide.galleryDetail.destroy', $gallery_detail->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure galleryDetail deleting this gallery image..!');"
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
                                        {{ $gallery_detail_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('guide.guideInclude.footer')
