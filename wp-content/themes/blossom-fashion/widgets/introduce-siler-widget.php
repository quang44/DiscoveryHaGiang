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
class Elementor_slides_Widget extends \Elementor\Widget_Base
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
        return 'Sildes giới thiệu';
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
        return esc_html__('Slides giới thiệu', 'elementor-slides-widget');
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
        return 'eicon-image-box';
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
        return ['slides giới thiệu', 'slides'];
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
                'label' => esc_html__('Content', 'elementor-slides-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => esc_html__( 'Add Images', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );
//        $repeater = new \Elementor\Repeater();
//
//        $repeater->add_control(
//            'text_location',
//            [
//                'label' => esc_html__('Vị trí', 'elementor-slides-widget'),
//                'type' => \Elementor\Controls_Manager::TEXT,
//                'placeholder' => esc_html__('Nhập vị trí', 'elementor-slides-widget'),
//                'default' => esc_html__('Vị trí', 'elementor-slides-widget'),
//                'label_block' => true,
//                'dynamic' => [
//                    'active' => true,
//                ],
//            ]
//        );


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
        <div class="silde_traveler traveler-js owl-carousel owl-theme wow fadeInUp" data-wow-delay="0.3s">
            <?php foreach ( $settings['images'] as $image ) :?>
                <a href="" class="single_traveler">
                    <div class="banner">
                        <div class="thumbnail-img">
                            <?= wp_get_attachment_image($image['id'], 'full') ?>
<!--                            <img src="--><?//= esc_attr( $image['url'] ) ?><!--" alt="">-->
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    <?php }
}