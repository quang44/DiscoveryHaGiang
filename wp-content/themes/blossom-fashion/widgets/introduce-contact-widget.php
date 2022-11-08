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
class Elementor_contact_Widget extends \Elementor\Widget_Base
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
        return 'Liên hệ';
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
        return esc_html__('Liên hệ', 'elementor-contact-widget');
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
        return ['Liên hệ', 'contact'];
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
                'label' => esc_html__('Content', 'elementor-contact-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );



        $this->add_control(
            'bg_contact',
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
                'name' => 'bg_contact',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'title_contact',
            [
                'label' => esc_html__('Tên khách sạn', 'elementor-contact-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Nhập tên', 'elementor-contact-widget'),
                'default' => esc_html__('khách sạn', 'elementor-contact-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'text_contact',
            [
                'label' => esc_html__('Title', 'elementor-contact-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Nhập nội dung', 'elementor-contact-widget'),
                'default' => esc_html__('nội dung', 'elementor-contact-widget'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'elementor-contact-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'elementor-contact-widget'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        /* End repeater */

        $this->add_control(
            'list_items',
            [
                'label' => esc_html__('thông tin liên hệ', 'elementor-contact-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),           /* Use our repeater */
                'default' => [
                    [
                        'text_contact' => esc_html__('Địa chỉ', 'elementor-contact-widget'),
                        'link' => '',
                    ],
                    [
                        'text_contact' => esc_html__('Số điện thoại', 'elementor-contact-widget'),
                        'link' => '',
                    ],
                    [
                        'text_contact' => esc_html__('Email', 'elementor-contact-widget'),
                        'link' => '',
                    ],
                ],
                'title_field' => '{{{ text_contact }}}',
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
        <div class="contact_item">
            <div class="container">
                <div class="html_flex">
                    <div class="bann-contact wow fadeInLeft" data-wow-delay="0.5s">
                        <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html($settings, 'bg_contact') ?>
                    </div>
                    <div class="col-contact wow fadeInRight" data-wow-delay="0.5s">
                        <div class="title-circle">
                            <h2 class="title30">liên hệ</h2>
                        </div>
                        <div class="products">
                            <h2 class="title24"><?= $settings['title_contact'] ?></h2>
                            <div class="address_information">
                                <div class="info_item">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="24" viewBox="0 0 19 24" fill="none">
                                            <path d="M9.5032 23.284C7.91604 21.9302 6.44488 20.446 5.10512 18.847C3.09456 16.4456 0.707032 12.8694 0.707032 9.46148C0.70525 5.90223 2.84858 2.69269 6.13687 1.33055C9.42515 -0.0315929 13.2102 0.722158 15.7259 3.24007C17.3801 4.88698 18.3068 7.12721 18.2994 9.46148C18.2994 12.8694 15.9118 16.4456 13.9013 18.847C12.5615 20.446 11.0904 21.9302 9.5032 23.284ZM9.5032 3.1785C6.03493 3.18265 3.22438 5.99321 3.22022 9.46148C3.22022 10.9267 3.88245 13.4637 7.03399 17.2348C7.81074 18.1622 8.63491 19.0489 9.5032 19.8912C10.3716 19.0499 11.1961 18.1645 11.9737 17.2385C15.124 13.4625 15.7862 10.9254 15.7862 9.46148C15.782 5.99321 12.9715 3.18265 9.5032 3.1785ZM9.5032 13.2313C7.42121 13.2313 5.73342 11.5435 5.73342 9.46148C5.73342 7.37948 7.42121 5.69169 9.5032 5.69169C11.5852 5.69169 13.273 7.37948 13.273 9.46148C13.273 10.4613 12.8758 11.4201 12.1688 12.1271C11.4619 12.8341 10.503 13.2313 9.5032 13.2313Z" fill="#0274B6"></path>
                                        </svg>
                                    </div>
                                    <div class="info-text">
                                        <h3>Địa chỉ</h3>
                                        <a <?= ($settings['list_items'][0]['url']) ? 'href="' . $settings['list_items'][0]['link']['url'] .'"' : ''?>><p><?= $settings['list_items'][0]['text_contact'] ?></p></a>
                                    </div>
                                </div>
                                <div class="info_item">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M3.20833 1.16699H7.375L9.45833 6.37533L6.85417 7.93783C7.96975 10.1998 9.80049 12.0306 12.0625 13.1462L13.625 10.542L18.8333 12.6253V16.792C18.8333 17.3445 18.6138 17.8744 18.2231 18.2651C17.8324 18.6558 17.3025 18.8753 16.75 18.8753C12.6867 18.6284 8.85433 16.9029 5.97586 14.0245C3.0974 11.146 1.37193 7.31359 1.125 3.25033C1.125 2.69779 1.34449 2.16789 1.73519 1.77719C2.12589 1.38649 2.6558 1.16699 3.20833 1.16699" stroke="#0274B6" stroke-width="1.0362" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="info-text">
                                        <h3>Số điện thoại</h3>
                                        <a <?= ($settings['list_items'][1]['url']) ? 'href="' . $settings['list_items'][1]['link']['url'] .'"' : ''?>><p><?= $settings['list_items'][1]['text_contact'] ?></p></a>
                                    </div>
                                </div>
                                <div class="info_item">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="17" viewBox="0 0 21 17" fill="none">
                                            <path d="M17.7917 1.20801H3.20833C2.05774 1.20801 1.125 2.14075 1.125 3.29134V13.708C1.125 14.8586 2.05774 15.7913 3.20833 15.7913H17.7917C18.9423 15.7913 19.875 14.8586 19.875 13.708V3.29134C19.875 2.14075 18.9423 1.20801 17.7917 1.20801Z" stroke="#0274B6" stroke-width="1.0362" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M1.125 3.29175L10.5 9.54175L19.875 3.29175" stroke="#0274B6" stroke-width="1.0362" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="info-text">
                                        <h3>Email</h3>
                                        <a <?= ($settings['list_items'][2]['url']) ? 'href="' . $settings['list_items'][2]['link']['url'] .'"' : ''?>><p><?= $settings['list_items'][2]['text_contact'] ?></p></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
}
