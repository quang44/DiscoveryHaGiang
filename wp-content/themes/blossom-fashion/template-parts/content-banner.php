<div class="bann_col0_slidein wow fadeInDown" data-wow-delay="0.5s">
    <?php $images = get_field('list_banner', get_queried_object_id());

    ?>
    <div id="slidein-banner" class="owl-carousel owl-theme">
        <?php if(isset($images) && $images) { foreach ($images as $image) :?>
            <a href="">
                <?php echo wp_get_attachment_image($image, 'full') ?>
            </a>
        <?php endforeach;} ?>

    </div>
</div>
<script>
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
</script>