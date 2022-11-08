<?php

/**
 * Template Name:   All restaurant
 **/
?>
<?php

get_header(); ?>


<?php

$taxonomies = get_terms(array(
    'taxonomy' => 'restaurant_cat',
    'hide_empty' => false
));
// echo "<pre>";
// print_r($taxonomies);
// echo "</pre>";

// echo "<pre>";
// print_r($wp_query);
// echo "</pre>";
?>

    <div class="products_list">
        <div class="list_content">
            <div class="profil_col3_menu wow fadeInDown" data-wow-delay="0.5s">
                <div class="main_fill">
                    <div class="tabel">
                        <div class="list-danhmuc-sp">
                            <?php foreach ($taxonomies as $restaurant_cat) {
                                $link = get_term_link($restaurant_cat->slug, 'restaurant_cat');
                                $active = $_SERVER['REQUEST_URI'] == $link ? 'checked="checkbox"' : ''
                                ?>
                                <div class="label">
                                    <a href="<?= $link ?>" title="" class="danhmuc-sp">
                                        <input class="dashtitle" <?= $active ?> name="" type="radio">
                                        <div class="item_title">
                                            <h3 class="title16 link_text"><?= $restaurant_cat->name ?></h3>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-item-list">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'posts_per_page' => 6,
                    'post_type' => 'restaurant',
                    'paged' => $paged,
                    'post_status' => 'publish',
                    'order' => 'DESC',
                    'orderby' => 'ID',
                );
                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) : ?>
                    <div class="flex_products">
                        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                            <a href="<?php the_permalink(); ?>" title="" class="single-product wow fadeIn"
                               data-wow-delay="0.3s">
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

                        <?php endwhile;
                        $total_pages = $wp_query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));
                        } ?>

                    </div>
                <?php else : ?>
                    <h3><?php _e('404 Error&#58; Not Found', ''); ?></h3>
                <?php endif; ?>


                <div class="pagination">
                    <ul class="">
                        <?php
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => 'page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text' => __('« prev'),
                            'next_text' => __('next »'),
                        ));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
