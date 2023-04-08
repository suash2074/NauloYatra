@include('include.toppart')

<body>
    @include('include.navbar')
    <section class="blog" id="blog">
        <div class="blog-text container">
            <div class="gallery-container">
                <div class="heading">
                    <h3 style="color: rgb(186, 186, 186);">Photo <span>Gallery</span></h3>
                </div>
                @if (isset($trek_infos))
                    @foreach ($trek_infos as $trek)
                        <h3 style="color: rgb(186, 186, 186);">OF {{ $trek->trek_name }}</h3>
                    @endforeach
                @endif
            </div>
        </div>
    </section>


    <div class="container-fluid">
        <div class="container-sm">
            <section id="news" class="news section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <ul id="news-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".Spring">Spring</li>
                                <li data-filter=".Summer">Summer</li>
                                <li data-filter=".Autumn">Autumn</li>
                                <li data-filter=".Winter">Winter</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row news-container" data-aos="fade-up" data-aos-delay="200">
                        @if (isset($gallery_infos))
                            @foreach ($gallery_infos as $gallery)
                                <div class="col-lg-4 col-md-6 news-item {{ $gallery->gallery_info['season'] }}">
                                    <div class="news-wrap">
                                        <img src="{{ asset('uploads/gallery/' . $gallery->gallery_info['gallery_image']) }}"
                                            class="img-fluid" alt="">
                                        <div class="news-info">
                                            <p>{{ $gallery->gallery_info['image_caption'] }}</p>
                                            <div class="news-links">
                                                <a href="{{ asset('uploads/gallery/' . $gallery->gallery_info['gallery_image']) }}"
                                                    data-gallery="newsGallery" class="news-lightbox"><i
                                                        class="ni ni-image"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('include.footer')
