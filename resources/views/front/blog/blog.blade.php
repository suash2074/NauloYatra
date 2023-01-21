@include('include.toppart')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
    body {
        padding-top: 160px;
    }

    header {
        height: calc(4rem + 1rem)
    }

    header .nav-bar {
        display: flex;
        padding: 0 200px;
        background-color: #FEFEFE;
        box-shadow: 0 4px 8px 0px rgba(0, 0, 0, 0.2);
    }

    .container {
        background-color: #F8F8F8;
        box-shadow: 2px 2px 2px 2px rgb(179, 176, 176);
        border-radius: 2px
    }

    .card {
        background-color: #F8F8F8;
        border-radius: 0px;
        box-shadow: 0px 0px 0px 0px rgb(179, 176, 176);
        border: 0px;

    }

    .card-head {
        padding: 20px;
        border-bottom: 1px solid #C9C9C9;
    }

    /* .card-body {
        background-color: aqua;

    } */

    .left-content {
        width: 100%;
        /* padding-right: 50px; */
        display: flex;
        justify-content: end;
        align-items: center;
    }

    .card-body .left-content .prev-image {
        width: 40%;
        height: 60vh;
        overflow: hidden;
        /* background-color: rgb(255, 145, 0); */
        display: flex;
        justify-content: center;
        align-content: center;
        border-radius: 2px;
    }

    .card-body .left-content .content {
        width: 70%;
        height: 38vh;
        padding: 5px;
        background-color: #FFFFFF;
        position: absolute;
        margin-right: 250px;
        display: flex;
        border-radius: 12px;
        box-shadow: -5px 5px 6px 0px rgba(0, 0, 0, 0.251)
    }

    .right-content {
        width: 100%;
        /* padding-left: 50px; */
        display: flex;
        justify-content: start;
        align-items: center;
    }

    .card-body .right-content .prev-image {
        width: 40%;
        height: 60vh;
        overflow: hidden;
        /* background-color: rgb(255, 145, 0); */
        border-radius: 2px;
        display: flex;
        justify-content: center;
        align-content: center;
    }

    .card-body .right-content .content {
        width: 70%;
        height: 38vh;
        padding: 5px;
        background-color: #FFFFFF;
        position: absolute;
        margin-left: 250px;
        display: flex;
        border-radius: 12px;
        box-shadow: 6px 5px 6px 0px rgba(0, 0, 0, 0.251)
    }
</style>

<body>
    @include('include.navbar')
    <div class="container">
        <div class="comtainer">
            <div class="d-flex justify-content-center">
                <div class="card w-75 ">
                    <div class="card-head mb-5">
                        <div>
                            search
                        </div>
                        <div>
                            bar
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="right-content">
                            <div class="content">
                                title
                            </div>
                            <div class="prev-image">
                                {{-- hi --}}
                                <img src={{ asset('images/view1.jfif') }} alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="left-content">
                            <div class="content">
                                title
                            </div>
                            <div class="prev-image">
                                {{-- hi --}}
                                <img src={{ asset('images/trek4.jfif') }}  alt="">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="right-content">
                            <div class="content">
                                title
                            </div>
                            <div class="prev-image">
                                {{-- hi --}}
                                <img src={{ asset('images/testimage.jpg') }}  alt="">
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="left-content">
                            <div class="content">
                                title
                            </div>
                            <div class="prev-image">
                                <img src={{ asset('images/trek5.jfif') }}  alt="">
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="right-content">
                            <div class="content">
                                title
                            </div>
                            <div class="prev-image">
                                {{-- hi --}}
                                <img src={{ asset('images/view1.jfif') }} alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        footer
