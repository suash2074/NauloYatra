@include('admin.adminInclude.header')

@include('admin.adminInclude.sidebar')


<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">Dashboard</a>
            @include('admin.adminInclude.topNav')

            @include('admin.adminInclude.status')


            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-8 mb-5 mb-xl-0">
                        <div class="card bg-gradient-default shadow">
                            <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="text-uppercase text-light ls-1 mb-1">
                                            Overview
                                        </h6>
                                        <h2 class="text-white mb-0">Total income</h2>
                                    </div>
                                    <div class="col">
                                        <ul class="nav nav-pills justify-content-end">
                                            <li class="nav-item mr-2 mr-md-0" data-toggle="chart"
                                                data-target="#chart-sales"
                                                data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'
                                                data-prefix="Nrs " data-suffix="k">
                                                <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                    <span class="d-none d-md-block">Month</span>
                                                    <span class="d-md-none">M</span>
                                                </a>
                                            </li>
                                            <li class="nav-item" data-toggle="chart" data-target="#chart-sales"
                                                data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'
                                                data-prefix="Nrs " data-suffix="k">
                                                <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                                    <span class="d-none d-md-block">Week</span>
                                                    <span class="d-md-none">W</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Chart -->
                                <div class="chart">
                                    <!-- Chart wrapper -->
                                    <canvas id="chart-sales" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card shadow">
                            <div class="card-header bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="text-uppercase text-muted ls-1 mb-1">
                                            Performance
                                        </h6>
                                        <h2 class="mb-0">Total bookings</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Chart -->
                                <div class="chart">
                                    <canvas id="chart-orders" class="chart-canvas"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.adminInclude.footer')

            <script>
                OrdersChart = function() {
                        var e, a, t = $("#chart-orders");
                        $('[name="ordersSelect"]');
                        t.length && (e = t, a = new Chart(e, {
                            type: "bar",
                            options: {
                                scales: {
                                    yAxes: [{
                                        gridLines: {
                                            lineWidth: 1,
                                            color: "#dfe2e6",
                                            zeroLineColor: "#dfe2e6"
                                        },
                                        ticks: {
                                            callback: function(e) {
                                                if (!(e % 10)) return e
                                            }
                                        }
                                    }]
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(e, a) {
                                            var t = a.datasets[e.datasetIndex].label || "",
                                                o = e.yLabel,
                                                n = "";
                                            return 1 < a.datasets.length && (n +=
                                                    '<span class="popover-body-label mr-auto">' + t + "</span>"),
                                                n += '<span class="popover-body-value">' + o + "</span>"
                                        }
                                    }
                                }
                            },
                            data: {
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                                    "Dec"
                                ],
                                datasets: [{
                                    label: "Sales",
                                    data: [25, 20, 30, 22, 17, 29, 10, 5, 1, 5, 5, 5]
                                }]
                            }
                        }), e.data("chart", a))
                    }(),
                    SalesChart = function() {
                        var e, a, t = $("#chart-sales");
                        t.length && (e = t, a = new Chart(e, {
                            type: "line",
                            options: {
                                scales: {
                                    yAxes: [{
                                        gridLines: {
                                            lineWidth: 1,
                                            color: Charts.colors.gray[900],
                                            zeroLineColor: Charts.colors.gray[900]
                                        },
                                        ticks: {
                                            callback: function(e) {
                                                if (!(e % 10)) return "Nrs " + e + "k"
                                            }
                                        }
                                    }]
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(e, a) {
                                            var t = a.datasets[e.datasetIndex].label || "",
                                                o = e.yLabel,
                                                n = "";
                                            return 1 < a.datasets.length && (n +=
                                                    '<span class="popover-body-label mr-auto">' + t + "</span>"),
                                                n += '<span class="popover-body-value">Nrs ' + o + "k</span>"
                                        }
                                    }
                                }
                            },
                            data: {
                                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov",
                                    "Dec"
                                ],
                                datasets: [{
                                    label: "Performance",
                                    data: [0, 0, 10, 30, 15, 40, 20, 60]
                                }]
                            }
                        }), e.data("chart", a))
                    }();
            </script>
