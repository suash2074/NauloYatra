@include('include.toppart')

<body>
    @include('include.navbar')
    <section class="blog" id="blog">
        <div class="blog-text container">
            <h2 class="blog-title" style="color: #fff">The packages</h2>
            <span class="blog-subtitle">Just one booking is required for your next journey..</span>
            <form action="" style="margin-top: 10px"
                class="navbar-search form-inline mr-3 d-flex justify-content-center d-md-flex ml-lg-auto">
                <div class="form-group mb-0 ">
                    <div class="input-group input-group-alternative border-0 bg-white">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control h-25" placeholder="Search" type="search"
                            name="search" value="" />
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter='all'>All</span>
        <span class="filter-item" data-filter='tea-house'>Tea House</span>
        <span class="filter-item" data-filter='tech'>Tech</span>
        <span class="filter-item" data-filter='mobile'>Mobile</span>
    </div>

    <section class="post container">

        <div class="post-box tea-house">
            <a href="" class="post-title">
                Package Name
            </a>
            <h3><span style="font-weight: 300">Guide name:</span> Suash rajbhandari</h3>
            <h2 class="category">Tea House</h2>
            <span class="duration">Duration: 6</span>
            <span class="post-date">Price per person: <span class="price"> RS. 1600</span></span>
            <hr>

            <span class="duration">Offering <span class="package"> Basic </span> package</span>

            <p class="package-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias
                labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde repellat doloribus, fugiat sapiente
                aperiam aut ut necessitatibus, mollitia sint eos commodi, voluptates maxime rerum repellendus eius.
                Quisquam sit ab tenetur harum magni labore molestiae repellat.</p>
            <p>Want to know about the trek click the <a href="https://www.youtube.com/">LINK</a></p>
            <div class="booking">
                <button class="book">
                    Book Now
                </button>
            </div>
            <div class="profile">
                <img src="{{ asset('images/view1.jfif') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

        <div class="post-box tech">
            <img src="{{ asset('images/view1.jfif') }}" alt="" class="post-img">
            <h2 class="category">tech</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/view1.jfif') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>
            </div>
        </div>

        <div class="post-box mobile">
            <img src="{{ asset('images/testimage.jpg') }}" alt="" class="post-img">
            <h2 class="category">Mobile</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/testimage.jpg') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

        <div class="post-box design">
            <img src="{{ asset('images/trek5.jfif') }}" alt="" class="post-img">
            <h2 class="category">Design</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/trek5.jfif') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

        <div class="post-box tech">
            <img src="{{ asset('images/trek4.jfif') }}" alt="" class="post-img">
            <h2 class="category">Tech</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/trek4.jfif') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

        <div class="post-box mobile">
            <img src="{{ asset('images/view1.jfif') }}" alt="" class="post-img">
            <h2 class="category">Mobile</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/view1.jfif') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

        <div class="post-box design">
            <img src="{{ asset('images/testimage.jpg') }}" alt="" class="post-img">
            <h2 class="category">Design</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/testimage.jpg') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

        <div class="post-box tech">
            <img src="{{ asset('images/trek5.jfif') }}" alt="" class="post-img">
            <h2 class="category">Tech</h2>
            <a href="#" class="post-title">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae, explicabo?
            </a>
            <span class="post-date">12 feb 2022</span>
            <hr>
            <p class="post-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet, molestias labore
                ullam, harum excepturi alias, sint impedit reiciendis quibusdam aspernatur at illum molestiae commodi
                id.</p>
            <div class="profile">
                <img src="{{ asset('images/trek5.jfif') }}" alt="" class="profile-img">
                <span class="profile-name">Suash Rajbhandari</span>

            </div>
        </div>

    </section>

    @include('include.footer')
