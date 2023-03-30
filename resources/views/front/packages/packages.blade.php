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
                        <input class="form-control h-25" placeholder="Search price, days or trek type" type="search"
                            name="search" value="{{ $search }}" />
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

        @if (isset($package_detail_infos))
            @foreach ($package_detail_infos as $package_details)
                <div class="post-box {{ $package_details->category }}">
                    <a href="" class="post-title">
                        {{ $package_details->package_info['package_name'] }}
                    </a>
                    @if (isset($packages_infos))
                        @foreach ($packages_infos as $package)
                            @if ($package->id == $package_details->package_id)
                                <h3><span style="font-weight: 300">Guide name:</span>
                                    {{ $package->user_info['first_name'] }}
                                    {{ $package->user_info['last_name'] }}</h3>
                                <h2 class="category">{{ $package->trek_info['trek_name'] }}
                                    ({{ $package_details->trek_type }})
                                </h2>
                            @endif
                        @endforeach
                    @endif

                    <span class="duration">Duration: {{ $package_details->days }}</span>
                    <span class="post-date">Price per person: <span class="price"> RS.
                            {{ $package_details->price_per_person }}</span></span>
                    <hr>

                    <span class="duration">Offering <span class="package"> {{ $package_details->category }} </span>
                        package</span>

                    <p class="package-description">{!! html_entity_decode($package_details->details) !!}</p>
                    <p>Want to know about the trek click the <a href="{{ $package_details->link }}">LINK</a></p>
                    <div class="booking">
                        {{-- <button class="book">
                            Book Now
                        </button> --}}


                        <button class="book" onclick="showPopup(), '{{ $package_details->id }}'">Open booking
                            Form</button>

                        <div class="popupForm">
                            @if (isset($package_detail_infos))
                                <form action="{{ route('book', $package_details->id) }}" method="POST">
                            @endif
                            @csrf
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
                            <button class="closeBtn btn btn-danger" onclick="hidePopup()" style="margin-right: 5px">
                                Close
                            </button>
                            </form>

                        </div>
                    </div>
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
