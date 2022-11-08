jQuery(document).ready(function () {

    jQuery('.other_relate-js').owlCarousel({
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
                margin: 18,
            },
            992: {
              items: 2,
              margin: 20,
            },
            1200: {
                items: 3,
                margin: 20,
            }
        }
    });
});

