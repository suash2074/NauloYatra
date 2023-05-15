@include('admin.adminInclude.header')
{{-- <style>
    #chart-container {
        height: 100vh;
    }
</style> --}}

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
                                                data-update='{"data":{"datasets":[{"data":[]}]}}' data-prefix="NRS "
                                                data-suffix="k">
                                                <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                                    <span class="d-none d-md-block">Month</span>
                                                    <span class="d-md-none">M</span>
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
                labels: {!! json_encode(array_keys($monthly_totals, $monthly_sales_json)) !!},
                    //Total booking per month js
                    OrdersChart = function() {
                        var e, a, t = $("#chart-orders");
                        var monthlyBookings = {!! json_encode($monthly_totals) !!};
                        var months = Object.keys(monthlyBookings);
                        var bookingCounts = Object.values(monthlyBookings);

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
                                                if (!(e % 5)) return e;
                                            }
                                        }
                                    }]
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(e, a) {
                                            var t = a.datasets[e.datasetIndex].label || "";
                                            var o = e.yLabel;
                                            var n = "";
                                            return 1 < a.datasets.length && (n +=
                                                    '<span class="popover-body-label mr-auto">' + t + "</span>"),
                                                n += '<span class="popover-body-value">' + o + "</span>";
                                        }
                                    }
                                }
                            },
                            data: {
                                labels: months,
                                datasets: [{
                                    label: "Bookings",
                                    data: bookingCounts
                                }]
                            }
                        }), e.data("chart", a))
                    }();

                //Total sales per month JS
                var monthly_Sales = {!! $monthly_sales_json !!};

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
                                            if (!(e % 10)) return "NRS " + e;
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
                                            n += '<span class="popover-body-value">Nrs ' + o + "</span>";
                                    }
                                }
                            }
                        },
                        data: {
                            labels: Object.keys(monthly_Sales), // Use the months as labels
                            datasets: [{
                                label: "Performance",
                                data: Object.values(monthly_Sales) // Use the sales values
                            }]
                        }
                    }), e.data("chart", a));
                }();
            </script>
