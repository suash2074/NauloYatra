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
                        <input class="form-control h-25" placeholder="Search" type="search" name="search"
                            value="" />
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="post-filter container">
        <span class="filter-item active-filter" data-filter='all'>All</span>
        <span class="filter-item" data-filter='Basic'>Basic</span>
        <span class="filter-item" data-filter='Standard'>Standard</span>
    </div>

    <section class="post container">

        @if (isset($package_infos))
            @foreach ($package_infos as $package)
                <div class="post-box {{ $package->category }}">
                    <a href="" class="post-title">
                        {{ $package->package_info['package_name'] }}
                    </a>
                    <h3><span style="font-weight: 300">Guide name:</span> {{ $package->package_info['user_id'] }}
                        {{ $package->package_info['last_name'] }}</h3>
                    <h2 class="category">{{ $package->trek_type }}</h2>
                    <span class="duration">Duration: {{ $package->days }}</span>
                    <span class="post-date">Price per person: <span class="price"> RS.
                            {{ $package->price_per_person }}</span></span>
                    <hr>

                    <span class="duration">Offering <span class="package"> {{ $package->category }} </span>
                        package</span>

                    <p class="package-description">{!! html_entity_decode($package->details) !!}</p>
                    <p>Want to know about the trek click the <a href="{{ $package->link }}">LINK</a></p>
                    <div class="booking">
                        {{-- <button class="book">
                            Book Now
                        </button> --}}

                        <button class="book" id="popupBtn">Click here to book</button>

                        <div id="popupForm" class="popupForm">
                            <form>
                                <label for="userName">Name:</label>
                                <input type="text" id="userName" name="userName">

                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email">

                                <label for="numberOfPeople">Number of people:</label>
                                <input type="number" id="numberOfPeople" name="numberOfPeople">

                                <label for="arrivalDate">Arrival date:</label>
                                <input type="date" id="arrivalDate" name="arrivalDate">

                                <label for="contactNumber">Contact number:</label>
                                <input type="tel" id="contactNumber" name="contactNumber">

                                <input type="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                    {{-- <div class="profile">
                        <img src="{{ asset('images/view1.jfif') }}" alt="" class="profile-img">
                        <span class="profile-name">Suash Rajbhandari</span>

                    </div> --}}
                </div>
            @endforeach
        @endif


    </section>
    <script>
        const popupBtn = document.getElementById("popupBtn");
        const popupForm = document.getElementById("popupForm");

        popupBtn.addEventListener("click", function() {
            popupForm.style.display = "block";
        });

        popupForm.addEventListener("submit", function(event) {
            event.preventDefault();
            const userName = document.getElementById("userName").value;
            const email = document.getElementById("email").value;
            const numberOfPeople = document.getElementById("numberOfPeople").value;
            const arrivalDate = document.getElementById("arrivalDate").value;
            const contactNumber = document.getElementById("contactNumber").value;

            // Send the form data to your server or do something else with it
            console.log("Name: " + userName);
            console.log("Email: " + email);
            console.log("Number of people: " + numberOfPeople);
            console.log("Arrival date: " + arrivalDate);
            console.log("Contact number: " + contactNumber);

            // Close the popup form
            popupForm.style.display = "none";
        });
    </script>
    @include('include.footer')
