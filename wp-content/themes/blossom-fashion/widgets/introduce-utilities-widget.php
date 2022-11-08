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
class Elementor_utilities_Widget extends \Elementor\Widget_Base
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
        return 'TIện ích';
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
        return esc_html__('Tiện ích', 'elementor-utilities-widget');
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
        return 'eicon-posts-carousel';
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
        return ['tiện ích', 'utilities'];
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
                'label' => esc_html__('Content', 'elementor-utilities-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'title_utilities',
            [
                'label' => esc_html__('Tiêu đề tiên ích', 'elementor-utilities-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Nhập tên', 'elementor-utilities-widget'),
                'default' => esc_html__('tiện ích', 'elementor-utilities-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'image_utilities',
            [
                'label' => esc_html__('Ảnh đại diện', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'image_utilities',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'textare_utilities',
            [
                'label' => esc_html__('nội dung ngắn', 'elementor-utilities-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'textarea',
                'placeholder' => esc_html__('Nhập nội dung tiện ích', 'elementor-utilities-widget'),
            ]
        );
        $repeater->add_control(
            'link_utilities',
            [
                'label' => esc_html__('Link', 'elementor-utilities-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'elementor-utilities-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Item tiện ích', 'elementor-utilities-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'title_utilities' => esc_html__('tiện ích', 'elementor-utilities-widget'),
                        'image_utilities' => '',
                        'textare_utilities' => '',
                        'link_utilities' => '',
                    ],
                ],
                'title_field' => '{{{ title_utilities }}}',
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
        <div class="item_utility">
            <div class="container">
                <div class="title-circle">
                    <h2 class="title30">Tiện tích</h2>
                </div>
                <div class="item_our our_silde-js owl-carousel owl-theme wow fadeInUp" data-wow-delay="0.3s">
                    <?php foreach ($settings['list_items'] as $item) : ?>
                        <a <?= ($item['link_utilities']['url']) ? 'href="' . $item['link_utilities']['url'] .'"' : ''?> title="<?= $item['title_utilities'] ?>" class="single">
                            <div class="content">
                                <div class="thumbnail-images">
                                    <div class="images">
                                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $item, 'image_utilities' ); ?>
                                    </div>
                                </div>
                                <div class="detail">
                                    <h3 class="title16"><?= $item['title_utilities'] ?></h3>
                                    <p class="title16"><?= $item['textare_utilities'] ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    <?php }
}
