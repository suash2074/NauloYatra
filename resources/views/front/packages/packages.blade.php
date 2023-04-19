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
                    <p class="post-title">
                        {{ $package_details->package_info['package_name'] }}
                    </p>

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

                    <span class="duration">Duration: {{ $package_details->days }} Days</span>
                    <span class="post-date">Price per person: <span class="price"> RS.
                            {{ $package_details->price_per_person }}</span></span>
                    <hr>

                    <span class="duration">Offering <span class="package"> {{ $package_details->category }} </span>
                        package</span>

                    <p class="package-description">{!! html_entity_decode($package_details->details) !!}</p>
                    <p>Want to know about the trek click the <a href="{{ $package_details->link }}">LINK</a></p>

                    @if (isset($booking_infos))
                        @php
                            $can_book = true;
                        @endphp
                        @foreach ($booking_infos as $booking)
                            @if ($booking->trip_status == 'Ongoing')
                                @php
                                    $can_book = false;
                                    break;
                                @endphp
                            @endif
                        @endforeach

                        @if ($can_book)
                            @if (isset($packages_infos))
                                @foreach ($packages_infos as $package)
                                    @if ($package->id == $package_details->package_id)
                                        <div class="booking">
                                            <button class="book"
                                                onclick="showPopup('<?php echo $package_details->id; ?>', '<?php echo $package->user_info['id']; ?>', '<?php echo $package_details->days; ?>', '<?php echo $package_details->price_per_person; ?>', '<?php echo $package->trek_info['id']; ?>' )">Open
                                                Booking
                                                Form</button>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @else
                            <div class="booking">
                                <button class="book"
                                    onclick="return alert('Please accept my apologies, it appears that you already have a trip planned, and therefore are unable to book another trek at this time.');">Open
                                    Booking Form</button>
                            </div>
                        @endif
                    @endif


                </div>
            @endforeach
        @endif

        <div class="popupForm">
            @if (isset($package_detail_infos))
                <form action="{{ route('book') }}" method="POST">
            @endif
            @csrf
            <h2>Booking Form</h2>

            <input type="hidden" id="package_id" name="package_id">

            <input type="hidden" id="guide_name" name="guide_name">

            <input type="hidden" id="days" name="days">

            <input type="hidden" id="price_per_person" name="price_per_person">

            <input type="hidden" id="trek_id" name="trek_id">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="number_of_people">Number of People:</label>
            <input type="number" id="number_of_people" name="number_of_people" required>

            <label for="arrival_date">Arrival Date:</label>
            <input type="date" id="arrival_date" name="arrival_date" required>

            <label for="contact_number">Contact:</label>
            <input type="text" id="contact_number" name="contact_number" required>

            <input class="btn btn-success" type="submit" value="Submit">
            <button class="closeBtn btn btn-danger" onclick="hidePopup()" style="margin-right: 5px">
                Close
            </button>
            </form>

        </div>


    </section>

    <script>
        function showPopup(package_id, guide_name, days, price_per_person, trek_id) {
            document.querySelector("#package_id").value = package_id;
            document.querySelector("#guide_name").value = guide_name;
            document.querySelector("#trek_id").value = trek_id;
            document.querySelector("#days").value = days;
            document.querySelector("#price_per_person").value = price_per_person;
            document.querySelector(".popupForm").style.display = "block";
        }

        function hidePopup() {
            document.querySelector(".popupForm").style.display = "none";
            document.querySelector(".popupForm").reset();
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
            const email = document.getElementById("email").value;
            const number_of_people = document.getElementById("number_of_people").value;
            const arrival_date = document.getElementById("arrival_date").value;
            const contact_number = document.getElementById("contact_number").value;

            // Send the form data to your server or do something else with it
            console.log("Email: " + email);
            console.log("Number of people: " + number_of_people);
            console.log("Arrival date: " + arrival_date);
            console.log("Contact number: " + contact_number);

            // Close the popup form
            popupForm.style.display = "none";
        });
    </script>
    @include('include.footer')
