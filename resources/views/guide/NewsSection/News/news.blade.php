@include('guide.guideInclude.header')

@include('guide.guideInclude.sidebar')

<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                href="{{ route('guide.news.index') }}">News</a>

            @include('guide.guideInclude.topNav')

            @include('guide.guideInclude.status')
            <div class="container-fluid mt--7">
                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0" style="display:flex; justify-content:space-between">
                                <h3 class="mb-0 font-weight-bold">News table</h3>

                                <!-- Form for searching-->
                                <form action="" class="navbar-search form-inline mr-3 d-none d-md-flex ml-lg-auto">
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-alternative border-0">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            </div>
                                            <input class="form-control h-25"
                                                placeholder="Search by headline or description" type="search"
                                                name="search" value="{{ $search }}" />
                                        </div>
                                    </div>
                                </form>

                                <a class="nav-link " href="{{ route('guide.news.create') }}">
                                    <i class="ni ni-fat-add text-primary"></i> News
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Headline</th>
                                            <th scope="col">Short Description</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($news_data))
                                            @foreach ($news_data as $news_datas => $news)
                                                <tr>
                                                    <td>{{ $news_datas + 1 }}</td>

                                                    <td>
                                                        @if (isset($news->user_info['username']))
                                                            {{ $news->user_info['username'] }}
                                                        @else
                                                            --
                                                        @endif
                                                    </td>

                                                    <td>{{ $news->headline }}</td>

                                                    <td>{!! html_entity_decode(Str::limit($news->short_description, 30)) !!}</td>


                                                    <td>{{ $news->status }}</td>

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
                                                                    href="{{ route('guide.news.edit', $news->id) }}">Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('guide.news.show', $news->id) }}">View</a>
                                                                <form action="{{ route('guide.news.destroy', $news->id) }}"
                                                                    method="post">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button class="dropdown-item"
                                                                        onclick="return confirm('Are you sure news deleting this news..!');"
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
                                        {{ $news_data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                @include('guide.guideInclude.footer')
