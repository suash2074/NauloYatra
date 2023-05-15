@include('include.toppart')


<body>
    @include('include.navbar')
    {{-- Post Content --}}
    <section class="post-header">
        @if (isset($trek_info))
            @foreach ($trek_info as $trek)
                <form action="{{ route('content', $trek->id) }}" method="get">
                    @csrf
                    <div class="header-content post-container">
                        {{-- Back to home --}}
                        @if (auth()->user()->role == 'user')
                            <a href="{{ route('blog') }}" class="back-home">Back</a>
                        @else
                        @endif
                        <!-- Title -->
                        <h1 class="header-title">{{ $trek->trek_name }}</h1>
                        <!-- Post Image -->
                        <img src="{{ asset('uploads/trek/' . $trek->background_image) }}" alt="About image"
                            class="header-img">
                        <div class="publisher-detail">
                            <div>
                                <h5>Published By: <span style="font-weight:300 ">{{ $trek->user_info['first_name'] }}
                                        {{ $trek->user_info['last_name'] }}</span></h5>
                            </div>
                            <div>
                                <h5>Published Date: <span style="font-weight:300 ">{{ $trek->created_at }}
                                    </span></h5>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @endif
    </section>

    @if (isset($about_info))
        @foreach ($about_info as $about)
            <form action="{{ route('content', $trek->id) }}" method="get">
                @csrf
                <section class="post-container post-content">
                    <h2 class="sub-heading">{{ $about->title }}</h2>
                    <p class="post-text">{!! html_entity_decode($about->description) !!}</p>

                    @if ($about->note != null)
                        <p style="font-family:'Times New Roman', Times, serif"><span style="font-weight:600">Note:
                            </span>{{ Str::ucfirst($about->note) }}</p>
                    @endif
                    <img src="{{ asset('uploads/about_section/' . $about->image) }}" alt="About image"
                        class="header-img">
                </section>
            </form>
        @endforeach
    @endif

    @if (isset($culture_info))
        @foreach ($culture_info as $culture)
            <form action="{{ route('content', $trek->id) }}" method="get">
                @csrf
                <section class="post-container post-content">
                    <h2 class="sub-heading">Culture</h2>
                    <p class="post-text">{!! html_entity_decode($culture->description) !!}</p>

                    @if ($culture->note != null)
                        <p style="font-family:'Times New Roman', Times, serif"><span style="font-weight:600">Note:
                            </span>{{ Str::ucfirst($culture->note) }}</p>
                    @endif
                    <img src="{{ asset('uploads/culture/' . $culture->image) }}" alt="About image" class="header-img">
                </section>
            </form>
        @endforeach
    @endif

    @if (isset($trek_info))
        @foreach ($trek_info as $trek)
            <form action="{{ route('content', $trek->id) }}" method="get">
                @csrf
                <section class="post-container post-content">

                    <h2 class="sub-heading">Trip Iternity & Cost</h2>
                    <p class="post-text"><span style="font-weight:600">Trek Type: </span> {{ $trek->trek_type }}</p>
                    <p><span style="font-weight:600">Track Difficulty: </span> {{ $trek->track_difficulty }}</p>
                    <p><span style="font-weight:600">Average Budget: </span>NRS {{ $trek->average_budget }}</p>
                    <p><span style="font-weight:600">Best season to visit: </span> {{ $trek->best_season }} Season</p>
                    <p><span style="font-weight:600">Duration: </span> {{ $trek->duration }} Days</p>

                    <hr style="background-color: rgba(118, 115, 115, 0.743)">
                </section>
            </form>
        @endforeach
    @endif

    <section class="post-container post-content">
        <h2 class="sub-heading">First Aid to carry and Illness</h2>
        <h5 class="sub-title">Illness</h5>
        @if (isset($health_kit_info))
            @foreach ($health_kit_info as $health_kit)
                <form action="{{ route('content', $trek->id) }}" method="get">
                    @csrf

                    <p style="margin-left: 15px">-{{ $health_kit->medicine_info['illness_name'] }}</p>
                </form>
            @endforeach
        @endif
        <h5 class="sub-title">First Aid</h5>
        @if (isset($health_kit_info))
            @foreach ($health_kit_info as $health_kit)
                <form action="{{ route('content', $trek->id) }}" method="get">
                    @csrf

                    <p style="margin-left: 15px">- {{ $health_kit->medicine_info['medicine_name'] }}</p>
                </form>
            @endforeach
        @endif
    </section>

    <section class="post-container post-content">
        <h2 class="sub-heading">Gallery</h2>
        <form action="{{ route('content', $trek->id) }}" method="get">
            @csrf
            <div class="row">
                @if (isset($gallery_infos))
                    @foreach ($gallery_infos as $gallery)
                        <div class="col-4">
                            <img src="{{ asset('uploads/gallery/' . $gallery->gallery_info['gallery_image']) }}"
                                alt="">
                        </div>
                    @endforeach
                @endif

                @if (auth()->user()->role == 'user')
                    <div class="d-flex justify-content-center pt-3" style="font-weight:500; font-size:1.2rem">
                        <a href="{{ route('gallery', $trek->id) }}"><u>More Images </u></a>
                    </div>
                @elseif(auth()->user()->role == 'guide')
                    <div class="d-flex justify-content-center pt-3" style="font-weight:500; font-size:1.2rem">
                        <a href="{{ route('guide.guideBlogGallery', $trek->id) }}"><u>More Images </u></a>
                    </div>
                @else
                    <div class="d-flex justify-content-center pt-3" style="font-weight:500; font-size:1.2rem">
                        <a href="{{ route('adminBlogGallery', $trek->id) }}"><u>More Images </u></a>
                    </div>
                @endif
            </div>
        </form>
    </section>


    <section class="post-container post-content">
        <h2 class="sub-heading">Map</h2>
        @foreach ($map_infos as $map)
            <p><span style="font-weight:600">Route From: </span>{{ $map->route_name }}</p>
        @endforeach
        <div id='map' style='width: 100%; height: 500px;'></div>

    </section>


    <section class="post-container post-content">
        <h2 class="sub-heading">Feedbacks</h2>
        @if (isset($comment_infos))
            @foreach ($comment_infos as $comment)
                @if (auth()->user()->role == 'user')
                    <form action="{{ route('content', $trek->id) }}" method="get">
                    @elseif(auth()->user()->role == 'guide')
                        <form action="{{ route('guide.guideBlogPostComment', $trek->id) }}" method="get">
                        @else
                            <form action="{{ route('adminBlogPostComment', $trek->id) }}" method="get">
                @endif
                @csrf

                <div class="d-flex justify-content-cennter row bg-white">
                    <div class="col-md-8">
                        <div class="p-2">
                            <div class="d-flex flex-row user-info">
                                @if (isset($trek['user_info']->photo) &&
                                        $trek['user_info']->photo != null &&
                                        file_exists(public_path() . '/uploads/user/' . $trek['user_info']->photo))
                                    <img src="{{ asset('uploads/user/' . $comment->user_info['photo']) }}"
                                        style="width: 50px; height:50px" class="rounded-circle" alt="">
                                @else
                                    <img src={{ asset('images/defaultUser.png') }} style="width: 50px" height="50px"
                                        class="rounded-circle" alt="">
                                @endif

                                <div class="d-flex flex-column justify-content-start ml-2">
                                    <span class="d-block font-weight-bold name">{{ $comment->user_info['first_name'] }}
                                        {{ $comment->user_info['last_name'] }}</span>
                                    <span class="date text-black-50">Shared Publically-
                                        {{ $comment->created_at }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p class="comment-text">{!! html_entity_decode($comment->text) !!}</p>
                        </div>
                    </div>
                </div>
                </form>
            @endforeach
        @endif

        <div class="p-2">
            @if (isset($comment_infos))
                @if (auth()->user()->role == 'user')
                    <form action="{{ route('postComment') }}" method="post" class="form"
                        enctype="multipart/form-data">
                @elseif(auth()->user()->role == 'guide')
                    <form action="{{ route('guide.guideBlogPostComment') }}" method="post" class="form"
                            enctype="multipart/form-data">
                @else
                    <form action="{{ route('adminBlogPostComment') }}" method="post" class="form"
                                enctype="multipart/form-data">
                @endif
                @csrf
            @endif
            @if (isset($trek_info))
                @foreach ($trek_info as $trek)
                    <div class="form-group col-6" style="display: none;">
                        <label for="trek_id" class="form-control-label">Trek Name <span
                                class="text-danger">*</span></label>
                        <input class="form-control" type="text" placeholder="Best thing about trek something"
                            name="trek_id" id="trek_id" value="{{ @$trek->id }}" required>

                    </div>
                @endforeach
            @endif
            <div class="d-flex flex-row align-items-start">
                @if (isset(auth()->user()->photo) &&
                        auth()->user()->photo != null &&
                        file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                    <img src="{{ asset('uploads/user/' . Auth::user()->photo) }}" style="width: 50px; height:50px"
                        class="rounded-circle" alt="">
                @else
                    <img src={{ asset('images/defaultUser.png') }} style="width: 50px; height:50px"
                        class="rounded-circle" alt="">
                @endif


                <textarea class="form-control ml-1 shadow-none textarea" name="text" id="text" cols="30"
                    rows="" style="resize: none" required></textarea>

            </div>
            <div class="mt-2 text-right">
                <button class="btn btn-success btn-sm shadow-none" type="submit">Post Feedback</button>
            </div>
        </div>
    </section>

    <br>
    <br>
    <style>
        .sd {
            color: rgb(45, 149, 218)
        }
    </style>
    <br>
    <br>
    <br>
    <hr>

    @include('include.footer')
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3Vhc2giLCJhIjoiY2w3bGs2YmZrMWl6bjNvcXUyYnl1MHdqbiJ9.IaGj0K14VoIswPrPUayS_w';
        const map = new mapboxgl.Map({
            container: 'map', // container ID
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12', // style URL
            @foreach ($map_infos as $map)
                center: [{{ $map->start_point }}], // starting position
            @endforeach
            zoom: 13 // starting zoom
        }); 

        // Set marker options.
        const marker = new mapboxgl.Marker({
                    color: "rgb(0, 132, 255)",
                    draggable: false
                    @foreach ($map_infos as $map)}).setLngLat([{{ $map->start_point }}])
            @endforeach
            .addTo(map);

        map.on('load', () => {
            map.addSource('route', {
                'type': 'geojson',
                'data': {
                    'type': 'Feature',
                    'properties': {},
                    'geometry': {
                        'type': 'LineString',
                        @foreach ($map_infos as $map)
                            'coordinates': [
                                {{ $map->path_coordinates }}
                            ]
                        @endforeach
                    }
                }
            });
            map.addLayer({
                'id': 'route',
                'type': 'line',
                'source': 'route',
                'layout': {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                'paint': {
                    'line-color': 'rgb(45, 149, 218)',
                    'line-width': 6
                }
            });
        });
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());
    </script>
