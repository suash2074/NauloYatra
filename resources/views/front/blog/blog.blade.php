@include('include.toppart')

<body>
    @include('include.navbar')
    <section class="blog" id="blog">
        <div class="blog-text container">
            <h2 class="blog-title" style="color: #fff">The Traveller's Blog</h2>
            <span class="blog-subtitle">Your next destination lies over here.</span>

            <form action="" style="margin-top: 10px"
                class="navbar-search form-inline mr-3 d-flex justify-content-center d-md-flex ml-lg-auto">
                <div class="form-group mb-0 ">
                    <div class="input-group input-group-alternative border-0 bg-white">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control h-25" placeholder="Search by trek name" type="search" name="search"
                            value="{{ $search }}" />
                    </div>
                </div>
            </form>

        </div>
    </section>

    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter='all'>All</span>
        <span class="filter-item" data-filter='Tea-House-Trek'>Tea House Trek</span>
        <span class="filter-item" data-filter='Gap-Trek'>Gap Trek</span>
        <span class="filter-item" data-filter='Camping-Trekking'>Camping Trekking</span>
    </div>

    <section class="post container">


        @if (isset($trek_info))

            @foreach ($trek_info as $trek)
                <div class="post-box {{ $trek->trek_type }}">
                    <img src="{{ asset('uploads/trek/' . $trek->background_image) }}" alt="" class="post-img">
                    <h2 class="category">{{ $trek->trek_type }}</h2>
                    @if (auth()->user()->role == 'user')
                        <a href="{{ route('content', $trek->id) }}" class="post-title">
                            {{ $trek->trek_name }}
                        </a>
                    @elseif(auth()->user()->role == 'guide')
                        <a href="{{ route('guide.guideBlogContent', $trek->id) }}" class="post-title">
                            {{ $trek->trek_name }}
                        </a>
                    @else
                        <a href="{{ route('adminBlogContent', $trek->id) }}" class="post-title">
                            {{ $trek->trek_name }}
                        </a>
                    @endif
                    <span class="post-date">{{ $trek->created_at }}</span>
                    <hr>
                    @if (isset($about_info))
                        @foreach ($about_info as $about)
                            @if ($trek->trek_name == $about->trek_info['trek_name'])
                                <p class="post-description">{!! html_entity_decode(Str::limit($about->description, 200)) !!}</p>
                            @endif
                        @endforeach
                    @endif
                    <div class="profile">
                        @if (isset($trek['user_info']->photo) &&
                                $trek['user_info']->photo != null &&
                                file_exists(public_path() . '/uploads/user/' . $trek['user_info']->photo))
                            <img src="{{ asset('uploads/user/' . $trek->user_info['photo']) }}" alt=""
                                class="profile-img">
                        @else
                            <img src={{ asset('images/defaultUser.png') }} alt="" class="profile-img">
                        @endif

                        <span class="profile-name">{{ $trek->user_info['first_name'] }}
                            {{ $trek->user_info['last_name'] }}</span>

                    </div>
                </div>
            @endforeach
        @endif

    </section>

    @include('include.footer')
