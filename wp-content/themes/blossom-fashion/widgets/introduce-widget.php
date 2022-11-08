<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Introduce_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     */
    public function get_name()
    {
        return 'Giới thiệu';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     */
    public function get_title()
    {
        return esc_html__('Giới thiệu', 'elementor-introduce-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     */
    public function get_icon()
    {
        return 'eicon-code';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @return string Widget help URL.
     * @since 1.0.0
     * @access public
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the oEmbed widget belongs to.
     *
     * @return array Widget keywords.
     * @since 1.0.0
     * @access public
     */
    public function get_keywords()
    {
        return ['giới thiệu', 'introduce'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Content', 'elementor-introduce-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title Introduce', 'elementor-introduce-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__('Nhập tiêu đề giới thiệu', 'elementor-introduce-widget'),
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'text_location',
            [
                'label' => esc_html__('Vị trí', 'elementor-introduce-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Nhập vị trí', 'elementor-introduce-widget'),
                'default' => esc_html__('Vị trí', 'elementor-introduce-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor-introduce-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'elementor-introduce-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Vị trí', 'elementor-introduce-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'text_location' => esc_html__('Vị trí', 'elementor-introduce-widget'),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ text_location }}}',
            ]
        );
        $this->add_control(
            'title_content',
            [
                'label' => esc_html__('tiêu đề nội dung', 'elementor-introduce-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
                'placeholder' => esc_html__('Nhập tiêu đề nội dung giới thiêu', 'elementor-introduce-widget'),
            ]
        );
        $this->add_control(
            'textare_content',
            [
                'label' => esc_html__('nội dung', 'elementor-introduce-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'textarea',
                'placeholder' => esc_html__('Nhập nội dung giới thiêu', 'elementor-introduce-widget'),
            ]
        );
        $this->add_control(
            'image_location',
            [
                'label' => esc_html__('Choose Image', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_location',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $this->add_control(
            'url_video',
            [
                'label' => esc_html__('URL video', 'elementor-oembed-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'input_type' => 'url',
                'placeholder' => esc_html__('https://your-link.com', 'elementor-oembed-widget'),
            ]
        );
        $this->end_controls_section();

    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="products_about_us">
            <div class="container">
                <div class="item_abouts">
                    <div class="item-title">
                        <h1 class="title32"><?= ($settings['title']) ? $settings['title'] : esc_html__('Giới thiệu', 'elementor-introduce-widget') ?></h1>
                        <?php if ($settings['list_items'][0]['text_location']) : ?>
                            <div class="maps">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path
                                            d="M10.0001 17.5C8.94753 16.6022 7.9719 15.618 7.08342 14.5575C5.75008 12.965 4.16675 10.5934 4.16675 8.33338C4.16557 5.973 5.58695 3.84453 7.76764 2.94121C9.94832 2.03788 12.4585 2.53774 14.1267 4.20754C15.2238 5.29972 15.8383 6.78537 15.8334 8.33338C15.8334 10.5934 14.2501 12.965 12.9167 14.5575C12.0283 15.618 11.0526 16.6022 10.0001 17.5ZM10.0001 4.16671C7.70004 4.16946 5.83617 6.03333 5.83342 8.33338C5.83342 9.30504 6.27258 10.9875 8.36258 13.4884C8.8777 14.1034 9.42426 14.6914 10.0001 15.25C10.576 14.6921 11.1228 14.1049 11.6384 13.4909C13.7276 10.9867 14.1667 9.30421 14.1667 8.33338C14.164 6.03333 12.3001 4.16946 10.0001 4.16671ZM10.0001 10.8334C8.61937 10.8334 7.50008 9.71409 7.50008 8.33338C7.50008 6.95266 8.61937 5.83338 10.0001 5.83338C11.3808 5.83338 12.5001 6.95266 12.5001 8.33338C12.5001 8.99642 12.2367 9.6323 11.7679 10.1011C11.299 10.57 10.6631 10.8334 10.0001 10.8334Z">
                                    </path>
                                </svg>
                                <a href="<?= $settings['list_items'][0]['link']['url'] ?>"
                                   target="<?= ($settings['list_items'][0]['link']['is_external']) ? '_bank' : ' ' ?>">
                                    <p class="title16"><?= $settings['list_items'][0]['text_location'] ?></p>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="rolling">
                        <div class="item_product wow bounceInLeft" data-wow-delay="0.3s">
                            <div class="title-circle">
                                <h2 class="title30"><?= ($settings['title_content']) ? $settings['title_content'] : esc_html__('Giới thiệu', 'elementor-introduce-widget') ?></h2>
                            </div>
                            <div class="text title16">
                                <?= nl2br($settings['textare_content']) ?>
                            </div>
                            <form method="post" action="http://discoverhagiang.nanoweb.vn/form-dat-tour/">
                                <input type="hidden" name="a" value="<?= get_the_title() ?>"/>
                                <input type="hidden" name="q" value="<?= $settings['textare_content'] ?>"/>
                                <?php
                                $post_id = get_the_ID();
                                //get image attributes like 'url', 'width' and 'height', of an image attachment file.
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
                                $url = $thumb['0']; // get url from array
                                ?>
                                <input type="hidden" name="c" value="<?= $url ?>"/>
                                <button class="butt active fix_btn" type="submit">Đặt ngay</button>
                            </form>
                        </div>
                        <div class="item_images wow bounceInRight" data-wow-delay="0.3s">
                            <a class="video fancyYoutube" <?= ($settings['url_video']['url']) ? 'data-fancybox="gallery"' : '' ?>
                                <?= ($settings['url_video']['url']) ? 'href="' . $settings['url_video']['url'] . '"' : '' ?>>
                                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'image_location'); ?>

                                <div class="play-video">
                                    <svg class="svg-inline--fa fa-play fa-w-14" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="play" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                              d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z">
                                        </path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--        <script>-->
        <!--            $(".fancyYoutube").fancybox({-->
        <!--                'transitionIn' : 'elastic',-->
        <!--                'padding'  : 0,-->
        <!--                'autoScale'  : false,-->
        <!--                'transitionOut' : 'fade',-->
        <!--                'width'   : 680,-->
        <!--                'height'  : 495,-->
        <!--                'type'   : 'swf'-->
        <!--            });-->
        <!--        </script>-->
    <?php }

}