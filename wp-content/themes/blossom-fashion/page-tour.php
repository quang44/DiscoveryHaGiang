<?php

/**
 * Template Name:   contact tour
 **/
?>
<?php

get_header(); ?>

    <div class="html_book_col">
        <?php
        $title = trim($_POST["a"]);
        $desc = trim($_POST["q"]);
        $image = trim($_POST["c"]);
        ?>
        <!-- <div class="breadcrumb">
            <a href="" title="">Trang chủ</a>
            <a href="" title="">Đặt tour du lịch</a>
        </div> -->
        <div class="content_book">
            <?php if($title) : ?>
            <div class="item_products">
                <div class="thumbnail-images wow fadeInLeft" data-wow-delay="0.5s"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <div class="images">
                        <img src="<?= $image ?>" alt="">
                    </div>
                </div>
                <div class="detail wow fadeInRight" data-wow-delay="0.5s"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <h3 class="title20"><?= $title ?></h3>
                    <div class="item_review">
                        <div class="star">
                            <svg class="svg-inline--fa fa-star fa-w-18 active" aria-hidden="true" focusable="false"
                                 data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg><!-- <i class="fa fa-star active"></i> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star fa-w-18 active" aria-hidden="true" focusable="false"
                                 data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg><!-- <i class="fa fa-star active"></i> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star fa-w-18 active" aria-hidden="true" focusable="false"
                                 data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg><!-- <i class="fa fa-star active"></i> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star fa-w-18 active" aria-hidden="true" focusable="false"
                                 data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg><!-- <i class="fa fa-star active"></i> Font Awesome fontawesome.com -->
                            <svg class="svg-inline--fa fa-star fa-w-18 active" aria-hidden="true" focusable="false"
                                 data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path>
                            </svg><!-- <i class="fa fa-star"></i> Font Awesome fontawesome.com -->
                        </div>
                        <span>5/5</span>
                    </div>
                    <div class="price title24">Liên hệ</div>
                    <div class="desc_tour">
                        <?=  $desc ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="">
                <div class="group_detail group-col7 wow fadeInLeft" data-wow-delay="0.5s"
                     style="visibility: visible; animation-delay: 0.5s;">
                    <h3 class="title20">THÔNG TIN KHÁCH HÀNG</h3>
                    <div class="contact_information">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    jQuery(document).ready(function () {
        let domain = '<?= $title ?>';
        document.getElementById('title-hotel').value = domain; // id input lấy từ trong form của form contact7 trong quản trị
    })
</script>

<?php
get_footer();
