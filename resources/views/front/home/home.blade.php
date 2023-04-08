@include('include.toppart')

<body>
    @include('include.navbar')


    <div class="homeBackground">
        <img src="{{ asset('images/background1.png') }}" id="backgroundImg1">
        <h2 id="logoText">Naulo Yatra</h2>
        <img src="{{ asset('images/background2.png') }}" id="backgroundImg2">
    </div>


    <div class="pb-5 d-flex justify-content-center ">
        <div class="card w-50">
            <div class="moto card-body display-5">"Don't hold yourself, pack your bag and <br> Explore the
                Unexplored"
            </div>
        </div>
    </div>

    <div class="guide-form-pannel">
        <p class="form-message">If you're interested in becoming a guide, please note that we require our guides to have
            a strong understanding of the topic they'll be guiding on, as well as excellent communication skills. We
            also prioritize guides who are passionate about helping others learn and grow. If you meet these
            requirements, please mail out your details and we'll be in touch with you soon if you seems eligiable." <br>
            <span class="form-message-note">Note: While mailing us don't forget to tell your Naulo
                Yatra's User name. </span>
            <br>
            <a
                href="mailto:suash.rb@gmail.com?subject=Submitting a request fro NAULO YATRA guide. &body=Dear [Reader],
            I hope this email finds you well. I am reaching out to inquire about your interest in becoming a guide for our upcoming project. Before we proceed further, we would like to gather some information about your personal details and qualifications.
            Would you kindly provide us with some information on your background, skills, and experience? This will help us determine if you are a good fit for the role of a guide.Thank you for considering this opportunity. We look forward to hearing back from you soon.Best regards, [Your Name].
            Kindly remove this body and fill your data also don't forget to submit your NAULO YATRA'S 'username'."><button
                    class="compose-mail">Compose Mail</button></a>
        </p>

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
                        @if (isset($news_info))
                            @foreach ($news_info as $news)
                                <div class="col-lg-4 col-md-6 news-item filter-recently">
                                    <div class="news-wrap">
                                        <img src="{{ asset('uploads/news/' . $news->image) }}" class="img-fluid"
                                            alt="">
                                        <div class="news-info">
                                            <h4>{{ $news->headline }}</h4>

                                            <p style="text-align:justify; padding: 8px">{!! html_entity_decode($news->short_description) !!}</p>
                                            <div class="news-links">

                                                <a href="{{ route('newsDetail', $news->id) }}"
                                                    class="news-details-lightbox" data-glightbox="type: external"
                                                    title="news Details"><i class="bx bx-link"></i></a>
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
    <script>
        let backgroundImg1 = document.getElementById('backgroundImg1')
        let logoText = document.getElementById('logoText')

        window.addEventListener('scroll', function() {
            let value = window.scrollY
            backgroundImg1.style.top = value * 0.15 + 'px';
            logoText.style.marginTop = value * 0.7 + 'px';
        });
    </script>
    @include('include.footer')
