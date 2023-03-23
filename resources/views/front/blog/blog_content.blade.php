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
                        <a href="{{ route('blog') }}" class="back-home">Back</a>

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
                                <h5>Published Date: <span style="font-weight:300 ">2002/02/08 {{ $trek->created_at }}
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
                    <p style="font-family:'Times New Roman', Times, serif"><span style="font-weight:600">Note:
                        </span>{{ Str::ucfirst($about->note) }}</p>
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

                    <p style="font-family:'Times New Roman', Times, serif"><span style="font-weight:600">Note:
                        </span>{{ Str::ucfirst($culture->note) }}</p>
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
                    <p><span style="font-weight:600">Average Budget: </span> {{ $trek->average_budget }}</p>
                    <p><span style="font-weight:600">Best season to visit: </span> {{ $trek->best_season }}</p>
                    <p><span style="font-weight:600">Duration: </span> {{ $trek->duration }}</p>

                    <hr>
                </section>
            </form>
        @endforeach
    @endif

    <section class="post-container post-content">
        @if (isset($health_kit_info))
            @foreach ($health_kit_info as $health_kit)
                <form action="{{ route('content', $trek->id) }}" method="get">
                    @csrf

                    <h2 class="sub-heading">First Aid to carry and Illness</h2>
                    <h5 class="sub-title">Illness</h5>
                    <p style="margin-left: 15px">-{{$health_kit->medicine_info['illness_name']}}</p>

                    <h5 class="sub-title">First Aid</h5>
                    <p style="margin-left: 15px">- {{$health_kit->medicine_info['medicine_name']}}</p>
                    
            @endforeach
        @endif
    </section>

    <section class="post-container post-content">
        Map
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

    @include('include.footer')

