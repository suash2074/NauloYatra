@include('include.toppart')
{{-- <a href="{{ route('logout') }}"><i class="uil uil-signout"></i>logout</a> --}}

<body>
    @include('include.navbar')

    {{-- <div class="media-icons" id="mediaIcons">
        <a href="#"><i class="uil uil-facebook-f"></i></a>
        <a href="#"><i class="uil uil-instagram"></i></a>
        <a href="#"><i class="uil uil-twitter"></i></a>
    </div> --}}

    <div class="homeBackground">
        <img src="images/background1.png" id="backgroundImg1">
        <h2 id="logoText">Naulo Yatra</h2>
        <img src="images/background2.png" id="backgroundImg2">
    </div>


    <div class="pb-5 d-flex justify-content-center ">
        <div class="card w-50">
            <div class="moto card-body display-5">"Don't hold yourself, pack your bag and <br> Explore the
                Unexplored"
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container-sm">
            <section id="news" class="news section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title text-center mt-5 pt-5 mb-3">
                        <h2>News</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <ul id="news-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <li data-filter=".filter-recently">Recently posted</li>
                                <li data-filter=".filter-popular ">Most popular</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row news-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-lg-4 col-md-6 news-item filter-recently">
                            <div class="news-wrap">
                                <img src="images/trek1.png" class="img-fluid" alt="">
                                <div class="news-info">
                                    <h4>Recently-Title</h4>
                                    
                                    <p>short description</p>
                                    <div class="news-links">
                                        {{-- <a href="{{ route('blog') }}" data-gallery="newsGallery" class="news-lightbox"
                                            title="Recently Posted 1"><i class="bx bx-plus"></i></a> --}}
                                        <a href="{{ route('newsDetail') }}" class="news-details-lightbox"
                                            data-glightbox="type: external" title="news Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 news-item filter-recently">
                            <div class="news-wrap">
                                <img src="images/trek2.jfif" class="img-fluid" alt="">
                                <div class="news-info">
                                    <h4>Recently-Title</h4>
                                    <p>short description</p>
                                    <div class="news-links">
                                        <a href="images/trek2.jfif" data-gallery="newsGallery" class="news-lightbox"
                                            title="Recently posted 2"><i class="bx bx-plus"></i></a>
                                        <a href="news-details.html" class="news-details-lightbox"
                                            data-glightbox="type: external" title="news Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 news-item filter-popular ">
                            <div class="news-wrap">
                                <img src="images/trek3.jfif" class="img-fluid" alt="">
                                <div class="news-info">
                                    <h4>Popular-Title</h4>
                                    <p>short description</p>
                                    <div class="news-links">
                                        <a href="images/trek3.jfif" data-gallery="newsGallery" class="news-lightbox"
                                            title="Card 2"><i class="bx bx-plus"></i></a>
                                        <a href="news-details.html" class="news-details-lightbox"
                                            data-glightbox="type: external" title="news Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 news-item filter-recently">
                            <div class="news-wrap">
                                <img src="images/trek4.jfif" class="img-fluid" alt="">
                                <div class="news-info">
                                    <h4>Recently-Title</h4>
                                    <p>short description</p>
                                    <div class="news-links">
                                        <a href="images/trek4.jfif" data-gallery="newsGallery" class="news-lightbox"
                                            title="Recently posted 3"><i class="bx bx-plus"></i></a>
                                        <a href="news-details.html" class="news-details-lightbox"
                                            data-glightbox="type: external" title="news Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 news-item filter-popular ">
                            <div class="news-wrap">
                                <img src="images/trek5.jfif" class="img-fluid" alt="">
                                <div class="news-info">
                                    <h4>Popular-Title</h4>
                                    <p>short description</p>
                                    <div class="news-links">
                                        <a href="images/trek5.jfif" data-gallery="newsGallery" class="news-lightbox"
                                            title="Card 1"><i class="bx bx-plus"></i></a>
                                        <a href="news-details.html" class="news-details-lightbox"
                                            data-glightbox="type: external" title="news Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 news-item filter-popular ">
                            <div class="news-wrap">
                                <img src="images/trek6.png" class="img-fluid" alt="">
                                <div class="news-info">
                                    <h4>Popular-Title</h4>
                                    <p>short description</p>
                                    <div class="news-links">
                                        <a href="images/trek6.png" data-gallery="newsGallery" class="news-lightbox"
                                            title="Card 3"><i class="bx bx-plus"></i></a>
                                        <a href="news-details.html" class="news-details-lightbox"
                                            data-glightbox="type: external" title="news Details"><i
                                                class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
         let backgroundImg1 = document.getElementById('backgroundImg1')
    let logoText = document.getElementById('logoText')

    window.addEventListener('scroll', function () {
        let value = window.scrollY
        backgroundImg1.style.top = value * 0.15 + 'px';
        logoText.style.marginTop = value * 0.7 + 'px';
    });
    </script>
    @include('include.footer')
