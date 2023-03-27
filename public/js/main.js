
(function () {




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

    $(".filter-item").click(function () {
        const value = $(this).attr("data-filter")
        if (value == "all") {
            $(".post-box").show("1000")
        } else {
            $(".post-box").not("." + value).hide("1000")
            $(".post-box").filter("." + value).show("1000")
        }
    });

    $('.filter-item').click(function () {
        $(this).addClass('active-filter').siblings().removeClass("active-filter");
    });

    
    
})()

let header = document.querySelector("header");

window.addEventListener("scroll", () => {
    header.classList.toggle('shadow', window.scrollY > 0);
})