@include('include.toppart')

<body>
    @include('include.navbar')
    <section class="blog" id="blog">
        <div class="blog-text container">
            <div class="gallery-container">
                <div class="heading">
                    <h3 style="color: rgb(186, 186, 186);">About<span> Us</span></h3>
                </div>
                <h3 style="color: rgb(186, 186, 186); margin-top:-20px">NAULO YATRA</h3>
            </div>
        </div>
    </section>


    <div class="container-fluid">
        <div class="container-sm mt-5" style="text-align:justify">
            <div class="row">
                <div class="col-6 fit">
                    <p>Naulo Yatra is a trekking website that has quickly become a go-to
                        resource for outdoor enthusiasts looking to explore Nepal's stunning
                        landscapes. Launched in 2018, the platform aims to create a community of
                        trekkers, providing a space for sharing experiences, tips, and advice.
                        The website offers a range of practical resources, including a
                        comprehensive guide to trekking in Nepal, equipment recommendations,
                        safety tips, and information on permits and visas. Users can also browse
                        and book packages and tours for their upcoming treks, making planning
                        their adventures easier than ever. Naulo Yatra is incredibly
                        user-friendly, with a simple interface and easy navigation, making it
                        accessible to trekkers of all levels, from beginners to experienced
                        veterans.</p>
                    <p>One of the most significant benefits of Naulo Yatra is the community
                        aspect of the platform. Users can connect with other trekkers, share
                        their experiences, and ask for advice on anything from route planning to
                        gear recommendations. This community spirit has helped to create a
                        supportive and encouraging environment for trekkers of all levels. It's
                        not just about sharing information; it's about building relationships
                        and connecting with like-minded individuals who share a passion for
                        trekking and the great outdoors.</p>
                </div>
                <div class="col-6 fit">
                    <img src="{{ asset('images/aboutPhoto1.webp') }}" alt="">

                </div>
            </div>

            <div class="row mt-5 mb-5 reverse">
                <div class="col-6 fit">
                    <img src="{{ asset('images/aboutPhoto2.jpg') }}" alt="">

                </div>
                <div class="col-6 fit">
                    <p>Another exciting feature of Naulo Yatra is the wealth of new and
                        undiscovered trekking routes and destinations that are featured on the
                        platform. While there are plenty of popular treks in Nepal, such as the
                        Annapurna Circuit and Everest Base Camp, Naulo Yatra showcases some of
                        the lesser-known trails that are just as stunning and rewarding. These
                        hidden gems offer a unique and authentic trekking experience, away from
                        the crowds and tourist hotspots.</p>
                    <p>In addition to promoting responsible and ethical trekking practices,
                        Naulo Yatra also contributes to the sustainable development of tourism
                        in Nepal. By showcasing lesser-known destinations, the website helps to
                        distribute the benefits of tourism more evenly throughout the country,
                        promoting economic development and job creation in rural areas. This
                        approach to sustainable tourism is crucial for ensuring that future
                        generations can continue to enjoy Nepal's stunning landscapes without
                        causing harm to the environment or local communities.</p>
                </div>
            </div>


            <p>Overall, Naulo Yatra is a valuable resource for anyone looking to explore
                Nepal's incredible trekking routes and destinations. The website's
                community aspect, practical resources, and promotion of responsible and
                sustainable tourism make it a game-changer for the trekking industry in
                Nepal. Whether you're a seasoned trekker or a beginner, Naulo Yatra
                offers a wealth of information and inspiration for planning your next
                adventure. With its user-friendly interface and passionate community of
                trekkers, Naulo Yatra is sure to become an essential tool for anyone
                looking to explore Nepal's stunning landscapes.</p>

        </div>
    </div>
    @include('include.footer')
