<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blossom_Fashion
 */

$sidebar_layout = blossom_fashion_sidebar_layout();
$posts = get_queried_object();
get_header(); ?>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0"
            nonce="iIjcxHvt"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0"
            nonce="Rze2vB6W"></script>
    <div class="html_culinary_col">
        <div class="row-flex">
            <div class="col-xl-9 col-lg-8">
                <div class="culinary_col9_products wow fadeInLeft" data-wow-delay="0.5s">
                    <h1 class=""><?php echo $posts->post_title ?></h1>
                    <div class="page_share">
                        <div class="post_published_date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                 fill="currentColor">
                                <path
                                        d="M7.99268 0.653564C3.9374 0.653564 0.653503 3.94481 0.653503 8.00009C0.653503 12.0554 3.9374 15.3466 7.99268 15.3466C12.0553 15.3466 15.3465 12.0554 15.3465 8.00009C15.3465 3.94481 12.0553 0.653564 7.99268 0.653564ZM8.00003 13.8773C4.75286 13.8773 2.12281 11.2472 2.12281 8.00009C2.12281 4.75292 4.75286 2.12287 8.00003 2.12287C11.2472 2.12287 13.8772 4.75292 13.8772 8.00009C13.8772 11.2472 11.2472 13.8773 8.00003 13.8773Z"/>
                                <path
                                        d="M8.36669 4.32666H7.26471V8.73457L11.1216 11.0487L11.6726 10.1451L8.36669 8.18358V4.32666Z"/>
                            </svg>
                            <?php echo $posts->post_date ?>
                        </div>
                        <div class="post_share">
                            <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width=""
                                 data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>
                <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator"
                     data-width="100%" data-numposts="1"></div>
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page' => 7,
                    'post_type' => 'restaurant',
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
                    <div class="html_col12_relate">
                        <h2 class="title32">Nhà hàng khác</h2>
                        <div class="other_relate other_relate-js owl-carousel owl-theme wow fadeInUp"
                             data-wow-delay="0.3s">
                            <?php foreach ($wp_query->posts as $post) :
                                $urlcheck = '/' . $post->post_type . '/' . $post->post_name . '/';
//                                print_r($urlcheck);
                                if ($url != $urlcheck):
                                    ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title() ?>"
                                       class="single-product">
                                        <div class="image-item">
                                            <div class="img_container ratio2x3 images">
                                                <?php the_post_thumbnail('post-thumbnail', $attr = '') ?>
                                            </div>
                                            <button class="butt active">
                                                <span>Xem ngay</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="11"
                                                     viewBox="0 0 20 11" fill="currentColor">
                                                    <path
                                                            d="M16.17 6.60864L13.59 9.19864L15 10.6086L20 5.60864L15 0.608643L13.59 2.01864L16.17 4.60864H0V6.60864H16.17Z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="detail-item">
                                            <h3 class="title16"><?php echo get_the_title() ?></h3>
                                            <div class="item-star">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill active"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill active"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill active"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill active"
                                                     viewBox="0 0 16 16">
                                                    <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                    <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                                                    </path>
                                                </svg>
                                                <span>50 review</span>
                                            </div>
                                            <div class="maps">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                            d="M10.0001 17.5C8.94753 16.6022 7.9719 15.618 7.08342 14.5575C5.75008 12.965 4.16675 10.5934 4.16675 8.33338C4.16557 5.973 5.58695 3.84453 7.76764 2.94121C9.94832 2.03788 12.4585 2.53774 14.1267 4.20754C15.2238 5.29972 15.8383 6.78537 15.8334 8.33338C15.8334 10.5934 14.2501 12.965 12.9167 14.5575C12.0283 15.618 11.0526 16.6022 10.0001 17.5ZM10.0001 4.16671C7.70004 4.16946 5.83617 6.03333 5.83342 8.33338C5.83342 9.30504 6.27258 10.9875 8.36258 13.4884C8.8777 14.1034 9.42426 14.6914 10.0001 15.25C10.576 14.6921 11.1228 14.1049 11.6384 13.4909C13.7276 10.9867 14.1667 9.30421 14.1667 8.33338C14.164 6.03333 12.3001 4.16946 10.0001 4.16671ZM10.0001 10.8334C8.61937 10.8334 7.50008 9.71409 7.50008 8.33338C7.50008 6.95266 8.61937 5.83338 10.0001 5.83338C11.3808 5.83338 12.5001 6.95266 12.5001 8.33338C12.5001 8.99642 12.2367 9.6323 11.7679 10.1011C11.299 10.57 10.6631 10.8334 10.0001 10.8334Z"/>
                                                </svg>
                                                <div class="title16 address-text"><?php echo wp_trim_words(the_excerpt(), 40, '...'); ?></div>
                                            </div>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-xl-3 col-lg-4">
                <?php
                $taxonomies = get_terms(array(
                    'taxonomy' => 'restaurant_cat',
                    'hide_empty' => false
                ));

                function menunlv($e)
                {
                    $navbar_items = $e;
                    $child_items = [];
                    // pull all child menu items into separate object
                    foreach ($navbar_items as $key => $item) {
                        if ($item->parent) {
                            array_push($child_items, $item);
                            unset($navbar_items[$key]);
                        }
                    }
                    // push child items into their parent item in the original object
                    foreach ($navbar_items as $item) {
                        foreach ($child_items as $key => $child) {
                            if ($child->parent == $item->term_id) {
                                if (!$item->child_items) {
                                    $item->child_items = [];
                                }
                                array_push($item->child_items, $child);
                                unset($child_items[$key]);
                            }
                        }
                    }
                    // return navbar object where child items are grouped with parents
                    return $navbar_items;
                }

                $menus = menunlv($taxonomies);
                ?>
                <div class="html_col3_menu">
                    <div class="tabel">
                        <div class="list-danhmuc-sp">
                            <?php foreach ($menus as $menuItem1) {
                                $link1 = get_term_link($menuItem1->slug, 'restaurant_cat');
                                $active1 = $url == $link1 ? 'checked="checkbox"' : '';
                                ?>
                                <div class="label">
                                    <label class="danhmuc-sp">
                                        <input class="dashtitle" <?= $active1 ?> name="" type="radio">
                                        <a href="<?= $link1 ?>">
                                            <div class="item_title">
                                                <h3 class="title16 link_text"><?= $menuItem1->name ?></h3>
                                            </div>
                                        </a>

                                        <?php
                                        if ($menuItem1->child_items) : ?>
                                            <div class="item_fields">
                                                <ul class="extra">
                                                    <?php foreach ($menuItem1->child_items as $menuItem2) :
                                                        $link2 = get_term_link($menuItem2->slug, 'restaurant_cat');
                                                        $active2 = $url == $link2 ? 'checked="checkbox"' : '';
                                                        ?>
                                                        <li>
                                                            <a href="<?= $link2 ?>">
                                                                <label>
                                                                    <input class="dashtitle" <?= $active2 ?> name=""
                                                                           type="radio">
                                                                    <div class="item-dm">
                                                                        <p class="title16"><?= $menuItem2->name ?></p>
                                                                    </div>
                                                                </label>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="html_col3_new_outstanding page_sidebar">
                    <h2 class="title24">tin nổi bật</h2>
                    <div class="page_sidebar_list_news">
                        <?php
                        $args = array(
                            'posts_per_page' => 7,
                            'post_type' => 'post',
//                            'taxonomy' => 'category',
//                            'paged' => $paged,
                            'post_status' => 'publish',
                            'order' => 'DESC',
                            'orderby' => 'ID',
                        );
                        $wp_queryPost = new WP_Query($args); ?>
                        <?php if (have_posts()) : ?>
                        <?php foreach ($wp_queryPost->posts as $post) : ?>
                                <?php
                                $ishot = get_field('ishot', $post->ID);
                                if ($ishot): ?>
                                    <a href="<?php the_permalink(); ?>" class="page_sidebar_news_item wow fadeInRight"
                                       data-wow-delay="0.3s"
                                       data-wow-duration="2s">
                                        <div class="news_thumbnail">
                                            <?php the_post_thumbnail('post-thumbnail', $attr = '') ?>
                                        </div>
                                        <div class="news_content">
                                            <p class="news_title title16"><?php echo wp_trim_words(get_the_title(), 40, '...'); ?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

<?php

get_footer();
