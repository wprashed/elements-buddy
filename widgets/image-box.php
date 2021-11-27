<?php
namespace elementsbuddy\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Image_box extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'image-box';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Image Box', 'elements-buddy' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-slider-vertical';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'elements_buddy' ];
    }

    /**
     * Retrieve the list of scripts the widget depended on.
     *
     * Used to set scripts dependencies required to run the widget.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget scripts dependencies.
     */
    public function get_script_depends() {
        return [ 'elements-buddy' ];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls() {

        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'elements-buddy' ),
            ]
        );

        $this->add_control(
            'primary_title',
            [
                'label' => __( 'Title', 'elements-buddy' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Digital Age Adventure', 'elements-buddy' ),
            ]
        );

        $this->add_control(
            'details',
            [
                'label' => __( 'Details', 'elements-buddy' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Grursus mal suada faci lisis Lorem ipsum dolarorit mor ametion the consectetur nec odio aea the dumm text.', 'elements-buddy' ),
            ]
        );

        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elements-buddy' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elements-buddy' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'About Us', 'elements-buddy' ),
            ]
        );

        $this->add_control(
			'button_link',
			[
				'label' => __( 'Button Link', 'elements-buddy' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elements-buddy' ),
			]
        );

        $this->end_controls_section();

        // Style Section

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'elements-buddy' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'elements-buddy' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .image-Box-area .single-image-box .image-box-body',
			]
		);

        $this->end_controls_section();

        // Title Style

        $this->start_controls_section(
            'title_style',
            [
                'label' => __( 'Title Style', 'elements-buddy' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'   => '#233D62',
                'selectors' => [
                    '{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'elements-buddy' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-title',
            ]
        );

        $this->end_controls_section();

        // Details Style

        $this->start_controls_section(
            'details_style',
            [
                'label' => __( 'Details Style', 'elements-buddy' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'details_color',
            [
                'label' => __( 'Details Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'   => '#616161',
                'selectors' => [
                    '{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-text p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'details_typography',
                'label' => __( 'Details Typography', 'elements-buddy' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-text p',
            ]
        );

        $this->end_controls_section();

        // Button Style

        $this->start_controls_section(
            'button_style',
            [
                'label' => __( 'Button Style', 'elements-buddy' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elements-buddy' ),
			]
		);

		$this->add_responsive_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elements-buddy' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f96520',
				'selectors' => [
					'{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_background_color',
			[
				'label' => __( 'Background Color', 'elements-buddy' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elements-buddy' ),
			]
		);

		$this->add_responsive_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-btn:hover' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#f96520',
				'selectors' => [
					'{{WRAPPER}} .image-Box-area .single-image-box .image-box-body .image-box-btn:hover, {{WRAPPER}} .banner-btn:focus' => 'background-color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_tab();

    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
    ?>
    <div class="single-image-box">
        <div class="image-box-thumbnail">
            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_html($settings['primary_title']); ?>">
        </div>
        <div class="image-box-body">
            <h2 class="image-box-title"><?php echo esc_html($settings['primary_title']); ?></h2>
            <div class="image-box-text">
                <p><?php echo esc_html($settings['details']); ?></p>
            </div>
            <a class="image-box-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><span class="box-btn-text"><?php echo esc_html($settings['button_text']); ?></span></a>		
        </div>
    </div>

   <?php
    }
}
