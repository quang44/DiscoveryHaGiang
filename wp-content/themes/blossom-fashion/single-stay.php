<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Fashion
 */

$sidebar_layout = blossom_fashion_sidebar_layout();

get_header(); ?>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0"
            nonce="iIjcxHvt"></script>
    <div class="detail_ks_pro">
        <?php

        the_content();
        //		while ( have_posts() ) : the_post();
        //
        //			get_template_part( 'template-parts/content', get_post_format() );
        //
        //		endwhile; // End of the loop.
        //		?>
        <div class="container">
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                 data-width="100%" data-numposts="1"></div>
        </div>


        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'posts_per_page' => 7,
            'post_type' => 'stay',
            'paged' => $paged,
            'post_status' => 'publish',
            'order' => 'DESC',
            'orderby' => 'ID',
        );
        //                $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        //                $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $url = $_SERVER['REQUEST_URI'];
        $wp_query = new WP_Query($args);
        if ($wp_query->have_posts()) : ?>
            <div class="product_other_hotel">
                <div class="container">
                    <h2 class="title32">KHÁCH SẠN khác</h2>
                    <!--                    --><?php
                    //                    echo "<pre>";
                    //                    print_r($wp_query);
                    //                    echo "</pre>";
                    //                    ?>
                    <div class="other_hotel other_hotel-js owl-carousel owl-theme wow fadeInUp" data-wow-delay="0.3s">
                        <?php foreach ($wp_query->posts as $post) :
                            $urlcheck = '/' . $post->post_type . '/' . $post->post_name . '/';
                            //                                print_r($urlcheck);
                            if ($url != $urlcheck):
                                ?>
                                <a href="<?php the_permalink(); ?>" title="" class="single-product">
                                    <div class="image-item">
                                        <div class="img_container ratio2x3 images">
                                            <?php the_post_thumbnail('post-thumbnail', $attr = '') ?>
                                        </div>
                                        <button class="butt active">
                                            <span>Xem ngay</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="11"
                                                 viewBox="0 0 20 11" fill="currentColor">
                                                <path d="M16.17 6.60864L13.59 9.19864L15 10.6086L20 5.60864L15 0.608643L13.59 2.01864L16.17 4.60864H0V6.60864H16.17Z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="detail-item">
                                        <h3 class="title16"><?php echo get_the_title() ?></h3>
                                        <div class="item-star">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star-fill active" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star-fill active" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star-fill active" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star-fill active" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-star-fill active" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                            </svg>
                                            <span>5/5</span>
                                        </div>
                                        <div class="maps">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10.0001 17.5C8.94753 16.6022 7.9719 15.618 7.08342 14.5575C5.75008 12.965 4.16675 10.5934 4.16675 8.33338C4.16557 5.973 5.58695 3.84453 7.76764 2.94121C9.94832 2.03788 12.4585 2.53774 14.1267 4.20754C15.2238 5.29972 15.8383 6.78537 15.8334 8.33338C15.8334 10.5934 14.2501 12.965 12.9167 14.5575C12.0283 15.618 11.0526 16.6022 10.0001 17.5ZM10.0001 4.16671C7.70004 4.16946 5.83617 6.03333 5.83342 8.33338C5.83342 9.30504 6.27258 10.9875 8.36258 13.4884C8.8777 14.1034 9.42426 14.6914 10.0001 15.25C10.576 14.6921 11.1228 14.1049 11.6384 13.4909C13.7276 10.9867 14.1667 9.30421 14.1667 8.33338C14.164 6.03333 12.3001 4.16946 10.0001 4.16671ZM10.0001 10.8334C8.61937 10.8334 7.50008 9.71409 7.50008 8.33338C7.50008 6.95266 8.61937 5.83338 10.0001 5.83338C11.3808 5.83338 12.5001 6.95266 12.5001 8.33338C12.5001 8.99642 12.2367 9.6323 11.7679 10.1011C11.299 10.57 10.6631 10.8334 10.0001 10.8334Z"/>
                                            </svg>
                                            <div class="title16 address-text"><?php echo wp_trim_words(the_excerpt(), 40, '...'); ?></div>
                                        </div>
                                    </div>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php

get_footer();
