@include('include.toppart')
<body>
    @include('include.navbar')
    {{-- Post Content --}}
    @if (isset($news_info))
        @foreach ($news_info as $news)
            <form action="{{ route('newsDetail.index', $news->id) }}" method="get">
                @csrf
                <section class="post-header" style="margin-bottom: 12rem">
                    <div class="header-content post-container">
                        {{-- Back to home --}}
                        <a href="{{ route('home') }}" class="back-home">Back</a>
                        <!-- Title -->
                        <h1 class="header-title">{{ $news->headline }}</h1>
                        <!-- Post Image -->
                        <img src="{{ asset('uploads/news/' . $news->image) }}" alt="About image" class="header-img">
                        <div class="publisher-detail">
                            <div>
                                <h5>Published By: <span style="font-weight:300 ">
                                        {{ $news->user_info['username'] }}
                                    </span></h5>
                            </div>
                            <div>
                                <h5>Published Date: <span style="font-weight:300 ">{{ $news->created_at }}</span></h5>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>
            </form>
        @endforeach
    @endif

    @if (isset($news_details_info))
        @foreach ($news_details_info as $news_details)
            <form action="{{ route('newsDetail.index', $news->id) }}" method="get">
                @csrf
                <section class="post-container post-content">
                    <h2 class="sub-heading">{{ $news_details->sub_headline }}</h2>
                    <p class="post-text">{!! html_entity_decode($news_details->description) !!}</p>
                    
                    <p style="font-weight:500">Link: <a href="{{$news_details->link}}"><u> Link Here </u></a></p>
                    <img src="{{ asset('uploads/news_detail/' . $news_details->image) }}" alt="About image" class="header-img">
                </section>
            </form>
        @endforeach
    @endif


    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

    @include('include.footer')


