<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blossom_Fashion
 */

/**
 * After Content
 *
 * @hooked blossom_fashion_bottom_shop_section - 10
 * @hooked blossom_fashion_instagram_section   - 15
 * @hooked blossom_fashion_content_end         - 20
 */
do_action('blossom_fashion_before_footer');

/**
 * Footer
 *
 * @hooked blossom_fashion_footer_start  - 20
 * @hooked blossom_fashion_footer_top    - 30
 * @hooked blossom_fashion_footer_bottom - 40
 * @hooked blossom_fashion_footer_end    - 50
 */
do_action('blossom_fashion_footer');

/**
 * After Footer
 *
 * @hooked blossom_fashion_page_end    - 20
 */
do_action('blossom_fashion_after_footer');

wp_footer(); ?>
<div id="google_translate_element2" style="display: none;"></div>
<style media="screen">
    .skiptranslate {
        display: none
    }
</style>
<script type="text/javascript">
    function googleTranslateElementInit2() {
        new google.translate.TranslateElement({
            pageLanguage: 'vi',
            autoDisplay: false
        }, 'google_translate_element2');
        const removePopup = document.getElementById('goog-gt-tt');
        removePopup.parentNode.removeChild(removePopup);
    }
    // jQuery(document).ready(function () {
    //     var leng = document.documentElement.lang.toLowerCase();
    //     // var leng = document.documentElement.lang.toLowerCase();
    //
    //     switch (leng) {
    //         case 'vi':
    //             document.getElementById('vi').classList.add("active");
    //             document.getElementById('en').classList.remove("active");
    //             break;
    //         case 'en':
    //             document.getElementById('en').classList.add("active");
    //             document.getElementById('vi').classList.remove("active");
    //             break;
    //         default:
    //             document.getElementById('vi').classList.add("active");
    //             document.getElementById('vi').classList.remove("active");
    //     }
    // })
</script>
<script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>
</body>
</html>
