// các function dùng cho toàn site
AOS.init();

new WOW().init();

// check elm in page
function isInPage(_elm) {
    return (jQuery(_elm).length > 0) ? true : false;
}

// check elm in viewport
function isInViewport(_select) {
    var el = document.querySelector(_select);
    if (isInPage(_select)) {
        var top = el.offsetTop;
        var left = el.offsetLeft;
        var width = el.offsetWidth;
        var height = el.offsetHeight;

        while (el.offsetParent) {
            el = el.offsetParent;
            top += el.offsetTop;
            left += el.offsetLeft;
        }

        return (
            top < (window.pageYOffset + window.innerHeight) &&
            left < (window.pageXOffset + window.innerWidth) &&
            (top + height) > window.pageYOffset &&
            (left + width) > window.pageXOffset
        );
    }
    return false;
}


jQuery(document).ready(function () {

    jQuery(window).scroll(function (event) {
        var pos_body = jQuery('html,body').scrollTop();
        // console.log(pos_body);
        if (pos_body > 20) {
            jQuery('.head_col0 .accordion').addClass('croll');
        } else {
            jQuery('.head_col0 .accordion').removeClass('croll');
        }
    });

    jQuery(function () {
        new WOW().init();
    })

    jQuery(document).ready(function() {
        jQuery('.profil_col3_menu').each(function() {
            jQuery(this).find('.fill-wrapper').click(function() {
                jQuery(this).toggleClass('rotate-menu');
                jQuery(this).parent().find('.main_fill').toggle(500);
            });
        });
    });

    jQuery(function () {
        function slideMenu() {
            var activeState = jQuery(".menu-top .menu_main").hasClass("active");
            jQuery(".menu-top .menu_main").animate({
                left: activeState ? "0%" : "-100%"
            }, 400);
        }

        jQuery(".menu-wrapper").click(function (event) {
            event.stopPropagation();
            jQuery(".hamburger").toggleClass("open");
            jQuery(".menu-top .menu_main").toggleClass("active");
            slideMenu();

            jQuery("body").toggleClass("overflow-hidden");
        });

        jQuery(".menu_main").find(".accordion-toggle").click(function () {
            jQuery(".menu_main .accordion-content").not(jQuery(this).next()).slideUp("fast").removeClass("open");
            jQuery(".menu_main .accordion-toggle").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
        });

    }); // jQuery load
});



jQuery(document).ready(function () {
    jQuery("#slidein-banner").owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        autoplay: true,
        items: 1,
        dots: false,
    });
});