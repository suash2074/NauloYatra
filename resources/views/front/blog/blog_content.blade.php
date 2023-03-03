@include('include.toppart')


<body>
    @include('include.navbar')
    {{-- Post Content --}}
    <section class="post-header">
        <div class="header-content post-container">
            {{-- Back to home --}}
            <a href="{{ route('blog') }}" class="back-home">Back</a>
            <!-- Title -->
            <h1 class="header-title">Trek Meme</h1>
            <!-- Post Image -->
            <img src="{{ asset('images/trek5.jfif') }}" alt="About image" class="header-img">
            <div class="publisher-detail">
                <div>
                    <h6>Published By: <span style="font-weight:300 "> Suash rajbhandari</span></h6>
                </div>
                <div>
                    <h6>Published Date:  <span style="font-weight:300 ">2002/02/08 </span></h6>
                </div>
            </div>
        </div>
    </section>


    <section class="post-container post-content">
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
        <img src="{{ asset('images/trek5.jfif') }}" alt="About image" class="header-img">
    </section>

    <section class="post-container post-content">

        <h2 class="sub-heading">Culture</h2>
        <p class="post-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo alias, explicabo voluptas
            qui animi maxime error labore similique doloremque asperiores repellendus saepe quidem repellat eligendi
            laborum culpa porro dolorum, totam voluptate nostrum magnam eaque dignissimos numquam quas. Id, deserunt.
            Obcaecati quidem itaque quo accusantium temporibus?</p>
        <p class="post-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo alias, explicabo voluptas
            qui animi maxime error labore similique doloremque asperiores repellendus saepe quidem repellat eligendi
            laborum culpa porro dolorum, totam voluptate nostrum magnam eaque dignissimos numquam quas. Id, deserunt.
            Obcaecati quidem itaque quo accusantium temporibus?</p>
        <p style="font-family:'Times New Roman', Times, serif"><span style="font-weight:600">Note: </span>Note here</p>
        <img src="{{ asset('images/trek5.jfif') }}" alt="About image" class="header-img">
    </section>

    <section class="post-container post-content">

        <h2 class="sub-heading">Trip Iternity & Cost</h2>
        <p class="post-text"><span style="font-weight:600">Trek Type: </span> Tea house</p>
        <p><span style="font-weight:600">Track Difficulty: </span> Tea house</p>
        <p><span style="font-weight:600">Average Budget: </span> Tea house</p>
        <p><span style="font-weight:600">Best season to visit: </span> Tea house</p>
        <p><span style="font-weight:600">Duration: </span> Tea house</p>

        <hr>
    </section>

    <section class="post-container post-content">

        <h2 class="sub-heading">First Aid to carry and Illness</h2>
        <h5 class="sub-title">Illness</h5>
        <p style="margin-left: 15px">- Tens</p>
        <p style="margin-left: 15px">- Tens</p>
        <p style="margin-left: 15px">- Tens</p>
        <p style="margin-left: 15px">- Tens</p>

        <h5 class="sub-title">First Aid</h5>
        <p style="margin-left: 15px">- Tens</p>
        <p style="margin-left: 15px">- Tens</p>
        <p style="margin-left: 15px">- Tens</p>
        <p style="margin-left: 15px">- Tens</p>
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
