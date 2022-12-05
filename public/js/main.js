
(function () {

    //Swiper slider

    var swiper = new Swiper(".bg-slider-thumbs", {
        loop: true,
        spaceBetween: 0,
        slidesPerView: 0,
    });
    var swiper2 = new Swiper(".bg-slider", {
        loop: true,
        spaceBetween: 0,
        thumbs: {
            swiper: swiper,
        },
    });


    /*--------------------------------------------------------------
    # Display Nav bar on scroll
    --------------------------------------------------------------*/
    var topNav = document.getElementById("nav-bar");

    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            topNav.style.display = "flex";
        }
        else {
            topNav.style.display = "none";
        }
    }

    function startFromTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }


/*--------------------------------------------------------------
# Navigation bar effects 
--------------------------------------------------------------*/
    window.addEventListener("scroll", function () {
        const header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 400);
    });

/*--------------------------------------------------------------
# Responsive navigation menu
--------------------------------------------------------------*/
const menuBtn = document.querySelector(".nav-menu-btn");
const closeBtn = document.querySelector(".nav-close-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
    navigation.classList.add("active");
});

closeBtn.addEventListener("click", () => {
    navigation.classList.remove("active");
});




    /*--------------------------------------------------------------
    # menu bar on click 
    --------------------------------------------------------------*/
    // const list = document.querySelectorAll('.list');

    // function activeLink() {
    //     list.forEach((item) =>
    //         item.classList.remove('active'));
    //     this.classList.add('active');
    // }
    // list.forEach((item) =>
    //     item.addEventListener('click', activeLink));

    //     const test = document.querySelectorAll('.test');

    //     function activeLink1() {
    //         test.forEach((item) =>
    //             item.classList.remove('active'));
    //         this.classList.add('active');
    //     }
    //     list.forEach((item) =>
    //         item.addEventListener('click', activeLink1));
    /*--------------------------------------------------------------
    # Parallax background effect on scroll
    --------------------------------------------------------------*/
    let backgroundimg1 = document.getElementById('backgroundimg1')
    // let backgroundImg2 = document.getElementById('backgroundImg2')
    let logoText = document.getElementById('logoText')

    window.addEventListener('scroll', function () {
        let value = window.scrollY
        backgroundImg1.style.top = value * 0.3 + 'px';
        // backgroundImg2.style.top = value * 0.27 + 'px';
        logoText.style.marginTop = value * 0.7 + 'px';
    })



    /*--------------------------------------------------------------
    # News filter
    --------------------------------------------------------------*/
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }


    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }


    window.addEventListener('load', () => {
        let newsContainer = select('.news-container');
        if (newsContainer) {
            let newsIsotope = new Isotope(newsContainer, {
                itemSelector: '.news-item'
            });

            let newsFilters = select('#news-flters li', true);

            on('click', '#news-flters li', function (e) {
                e.preventDefault();
                newsFilters.forEach(function (el) {
                    el.classList.remove('filter-active');
                });
                this.classList.add('filter-active');

                newsIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });
                newsIsotope.on('arrangeComplete', function () {
                    AOS.refresh()
                });
            }, true);
        }

    });

})()