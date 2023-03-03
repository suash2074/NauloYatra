@include('include.toppart')

<body>
    @include('include.navbar')
    <section class="blog" id="blog">
        <div class="blog-text container">
            <h2 class="blog-title">The Packages</h2>
            <span class="blog-subtitle">Your source of great content</span>
        </div>
    </section>

    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter='all'>All</span>
        <span class="filter-item" data-filter='design'>Design</span>
        <span class="filter-item" data-filter='tech'>Tech</span>
        <span class="filter-item" data-filter='mobile'>Mobile</span>
    </div>

    <section class="post container">

        <div class="post-box design">
            <a href="{{ route('content') }}" class="post-title">
               Package Name
            </a>
            <h3><span style="font-weight: 300">Guide name:</span> Suash rajbhandari</h3>
            <h2 class="category">Design</h2>
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