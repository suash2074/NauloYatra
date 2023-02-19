<footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
                &copy; 2023
                <a href="#" class="font-weight-bold ml-1" target="_blank">Naulo Yatra</a>
            </div>
        </div>
        <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                <li class="nav-item">
                    <a href="{{ route('adminBlog') }}" class="nav-link" target="_blank">Naulo Yatra</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" target="_blank">Blog</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</div>
</div>
<!--   Core   -->
<script src={{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}></script>
<script src={{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}></script>
<!--   Optional JS   -->
<script src={{ asset('assets/js/plugins/chart.js/dist/Chart.min.js') }}></script>
<script src={{ asset('assets/js/plugins/chart.js/dist/Chart.extension.js') }}></script>
<!--   Argon JS   -->
<script src={{ asset('assets/js/argon-dashboard.min.js?v=1.1.2') }}></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
@notifyJs
<script>
    window.TrackJS &&
        TrackJS.install({
            token: "ee6fab19c5a04ac1a32a645abde4613a",
            application: "argon-dashboard-free",
        });
</script>

<script>
    function checkSelectedValue() {
        var selectedValue = document.getElementById("role").value;
        if (selectedValue == "guide") {
            document.getElementById("guide").style.display = "block";
        } else {
            document.getElementById("guide").style.display = "none";
        }
    }
</script>
</body>

</html>
