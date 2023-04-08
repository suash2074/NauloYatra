<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Your Treks
                        </h5>

                        <span class="h2 font-weight-bold mb-0">
                            @php
                                $trek_count = DB::table('treks')->where('user_id', auth()->user()->id)->count('trek_name');
                                echo $trek_count;
                            @endphp
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Total Guides
                        </h5>
                        <span class="h2 font-weight-bold mb-0">
                            @php
                                $guide_count = DB::table('users')
                                    ->where('role', 'Guide')
                                    ->count('username');
                                echo $guide_count;
                            @endphp
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-chart-pie"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Total Users
                        </h5>
                        <span class="h2 font-weight-bold mb-0">
                            @php
                                $user_count = DB::table('users')
                                    ->where('role', 'User')
                                    ->count('username');
                                echo $user_count;
                            @endphp
                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6">
        <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">
                            Packages
                        </h5>
                        <span class="h2 font-weight-bold mb-0">
                            @php
                                $package_count = DB::table('package_details')->count('package_id');
                                echo $package_count;
                            @endphp

                        </span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                            <i class="fas fa-percent"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
