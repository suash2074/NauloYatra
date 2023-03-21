@include('include.toppart')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
    /* header {
        height: calc(4rem + 1rem)
    }

    header .nav-bar {
        display: flex;
        padding: 0 200px;
        background-color: #FEFEFE;
        box-shadow: 0 4px 8px 0px rgba(0, 0, 0, 0.2);
    } */

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap');

    * {
        font-family: 'Poppins', sans-serif;
    }

    a {
        text-decoration: none;
    }

    li {
        list-style: none;
    }

    img {
        width: 100%;
    }

    section {
        padding: 2rem 0 2rem;
    }
</style>

<body>
    @include('include.navbar')
    {{-- Post Content --}}
    @if (isset($news_info))
        @foreach ($news_info as $news)
            <form action="{{ route('newsDetail.index', $news->id) }}" method="get">
                @csrf
                <section class="post-header">
                    <div class="header-content post-container">
                        {{-- Back to home --}}
                        <a href="{{ route('home') }}" class="back-home">Back</a>
                        <!-- Title -->
                        <h1 class="header-title">{{ $news->headline }}</h1>
                        <!-- Post Image -->
                        <img src="{{ asset('uploads/news/' . $news->image) }}" alt="About image" class="header-img">
                        <div class="publisher-detail">
                            <div>
                                <h6>Published By: <span style="font-weight:300 ">
                                        {{ $news->user_info['username'] }}
                                    </span></h6>
                            </div>
                            <div>
                                <h6>Published Date: <span style="font-weight:300 ">{{ $news->created_at }}</span></h6>
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
                    <p class="post-text">{{$news_details->description}}</p>
                    
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


    {{-- <hr style="margin-top:150px">
    <section class="post-container post-content">
        <img src="{{ asset('images/trek5.jfif') }}" alt="About image" class="post-img">
        <h2 class="sub-heading">About Trek</h2>
        <p class="post-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo alias, explicabo voluptas
            qui animi maxime error labore similique doloremque asperiores repellendus saepe quidem repellat eligendi
            laborum culpa porro dolorum, totam voluptate nostrum magnam eaque dignissimos numquam quas. Id, deserunt.
            Obcaecati quidem itaque quo accusantium temporibus?</p>
        <p class="post-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo alias, explicabo voluptas
            qui animi maxime error labore similique doloremque asperiores repellendus saepe quidem repellat eligendi
            laborum culpa porro dolorum, totam voluptate nostrum magnam eaque dignissimos numquam quas. Id, deserunt.
            Obcaecati quidem itaque quo accusantium temporibus?</p>
<p style="font-family:'Times New Roman', Times, serif"><span style="font-weight:600">Note: </span>Note here</p>
    </section> --}}
