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
class Elementor_room_Widget extends \Elementor\Widget_Base
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
        return 'Loại phòng';
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
        return esc_html__('Loại phòng', 'elementor-room-widget');
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
        return ['Loại phòng', 'room'];
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
                'label' => esc_html__('Content', 'elementor-room-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();


        $this->add_control(
            'bg_room',
            [
                'label' => esc_html__('Ảnh đại diện', 'plugin-name'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'bg_room',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'title_room',
            [
                'label' => esc_html__('Tiêu đề phòng', 'elementor-room-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Nhập tên', 'elementor-room-widget'),
                'default' => esc_html__('phòng', 'elementor-room-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'image_room',
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
                'name' => 'image_room',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $repeater->add_control(
            'textare_room',
            [
                'label' => esc_html__('nội dung ngắn', 'elementor-room-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'textarea',
                'placeholder' => esc_html__('Nhập nội dung tiện ích', 'elementor-room-widget'),
            ]
        );
        $repeater->add_control(
            'detail_room',
            [
                'label' => esc_html__('nội dung ngắn', 'elementor-room-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'input_type' => 'textarea',
                'placeholder' => esc_html__('Nhập nội dung tiện ích', 'elementor-room-widget'),
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('Item tiện ích', 'elementor-room-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'title_room' => esc_html__('tiện ích', 'elementor-room-widget'),
                        'image_room' => '',
                        'textare_room' => '',
                        'detail_room' => '',
                    ],
                ],
                'title_field' => '{{{ title_room }}}',
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
//        echo "<pre>";
//        print_r($settings);
//        echo "</pre>";
        ?>
        <div class="kind_of_room wow fadeInDown" data-wow-delay="0.5s">
            <div class="bg">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'bg_room') ?>
            </div>
            <div class="main_title">
                <div class="container">
                    <div class="title-circle">
                        <h2 class="title30">Loại phòng</h2>
                    </div>
                </div>
            </div>
            <div class="slide_filing_pro " id="slide1">
                <?php foreach ($settings['list_items'] as $key => $item) : ?>
                    <a href="" class="single_slide">
                        <div class="image_single"><?= \Elementor\Group_Control_Image_Size::get_attachment_image_html($item, 'image_room') ?></div>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="slider_details">
                <div class="container">
                    <div class="detail_pro_item slide2" id="slide2">
                        <?php foreach ($settings['list_items'] as $key => $item) : ?>
                            <div class="detail_filing">
                                <div class="content">
                                    <div class="title title24"><?= $key + 1 ?>. <?= $item['title_room'] ?></div>
                                    <p class="title16"> <?= $item['textare_room'] ?></p>
                                </div>
                                <?php if ($item['detail_room']) : ?>
                                    <ul class="list_text">
                                        <?php
                                        $arr = explode("\n", nl2br($item['detail_room']));
                                        ?>
                                        <?php foreach ($arr as $item) {
                                            $items = explode(":", $item); ?>
                                            <li class="flex-list">
                                                <p class="title16"><?= $items[0] ?>:</p>
                                                <p class="title16 light"><?= $items[1] ?></p>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php }
}
