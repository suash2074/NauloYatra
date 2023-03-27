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
                        <input class="form-control h-25" placeholder="Search price, days or trek type" type="search" name="search"
                            value="{{$search}}" />
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
                    @if (isset($packages))
                        @foreach ($packages as $package_username)
                            <h3><span style="font-weight: 300">Guide name:</span>
                                {{ $package_username->user_info['first_name'] }}
                                {{ $package_username->user_info['last_name'] }}</h3>
                        @endforeach
                    @endif
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


                        <button class="book" onclick="showPopup()">Open Popup Form</button>

                        <div class="popupForm">
                            <form>
                                <h2>Booking Form</h2>
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" required>
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                                <label for="numPeople">Number of People:</label>
                                <input type="number" id="numPeople" name="numPeople" min="1" max="10"
                                    required>
                                <label for="arrivalDate">Arrival Date:</label>
                                <input type="date" id="arrivalDate" name="arrivalDate" required>
                                <label for="contactNum">Contact Number:</label>
                                <input type="tel" id="contactNum" name="contactNum" required>
                                <input class="btn btn-success" type="submit" value="Submit">
                                <button class="closeBtn btn btn-danger" onclick="hidePopup()"
                                    style="margin-right: 5px">Close</button>
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
        function showPopup() {
            document.querySelector(".popupForm").style.display = "block";
        }

        function hidePopup() {
            document.querySelector(".popupForm").style.display = "none";
        }
    </script>
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
