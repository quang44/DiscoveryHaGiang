jQuery(document).ready(function () {
    jQuery('.traveler-js').owlCarousel({
        loop: true,
        margin: 12,
        speed: 1000,
        dots: true,
        autoplay: true,
        items: 1,
        nav: true,
        center: true,
        // navText: ["<button class='nav-button owl-prev'></button>", "<button class='nav-button owl-next'></button>"],
        responsive: {
            0: {
                stagePadding: 30,
                margin: 8,
            },

            400: {
                stagePadding: 50,
                margin: 10,
            },

            768: {
                stagePadding: 120,
            },

            1000: {
                stagePadding: 180,
            },

            1200: {
                stagePadding: 250,
            },
        }
    });

    jQuery('.item_our').owlCarousel({
        loop: true,
        speed: 1000,
        nav: false,
        dots: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1.2,
                margin: 10,
            },
            400: {
                items: 1.4,
                margin: 16,
            },
            576: {
                items: 1.7,
                margin: 16,
            },
            768: {
                items: 2.3,
                margin: 20,
            },
            992: {
                items: 2.5,
                margin: 20,
            },
            1200: {
                items: 3,
                margin: 30,
            }
        }
    });

    jQuery('.other_hotel-js').owlCarousel({
        loop: true,
        speed: 1000,
        nav: false,
        dots: false,
        autoplay: true,

        responsive: {
            0: {
                items: 1.2,
                margin: 10,
            },
            400: {
                items: 1.4,
                margin: 16,
            },
            576: {
                items: 1.7,
                margin: 16,
            },
            768: {
                items: 2.3,
                margin: 20,
            },
            992: {
                items: 2.5,
                margin: 20,
            },
            1200: {
                items: 3,
                margin: 30,
            }
        }
    });


    $("#slide1").slick({
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        dots: false,
        infinite: true,
        useTransform: true,
        speed: 1000,
        cssEase: "cubic-bezier(0.77, 0, 0.18, 1)",
        variableWidth: true,
        asNavFor: '#slide2',

        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    slidesToShow: 1,
                },
            },
        ],
    });


    $('#slide2').on('init', function (event, slick) {
        $('#slide2 .slick-slide.slick-current').addClass('is-active');
    }).slick({
        slidesToShow: 1,
        asNavFor: '#slide1',
        vertical: true,
        focusOnSelect: true,
        dots: false,
        autoplay: false,
        arrows: false,
        speed: 2000,
        autoplaySpeed: 7000,
    });
});

