   <div class="footer container">
       <p>&#169; Naulo Yatra 2023 <br><a href="{{ route('about_us') }}"
               style="display:flex; justify-content:center; color:rgb(82, 80, 80)">About Us</a></p>

       <div class="social">
           <a href="#"><i class="uil uil-facebook-f"></i></a>
           <a href="#" style="color: #69abf2"><i class="uil uil-instagram"></i></a>
           <a href="#"><i class="uil uil-twitter"></i></a>
       </div>
   </div>


   <!--jquery js -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

   <!-- ionicons js -->
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

   <!-- Bootstrap js -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
   </script>

   <!-- Vendor JS Files -->
   <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

   <!-- main js File -->
   <script src="{{ asset('js/main.js') }}"></script>

   <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
   <script>
       const menuBtn = document.querySelector(".nav-menu-btn");
       const closeBtn = document.querySelector(".nav-close-btn");
       const navigation = document.querySelector(".navigation");

       menuBtn.addEventListener("click", () => {
           navigation.classList.add("active");
       });

       closeBtn.addEventListener("click", () => {
           navigation.classList.remove("active");
       });

    //    const image = document.querySelector("img"),
    //    input = document.querySelector("input");

    //    input.addEventListener("change", () => {
    //     image.src = URL.createObjectURL(input.files[0]);
    //    });
   </script>
   @notifyJs

   </body>

   </html>
