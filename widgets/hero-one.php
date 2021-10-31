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
class Hero_One extends Widget_Base {

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
        return 'hero-one';
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
        return __( 'Hero One', 'elements-buddy' );
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
            'sub_title',
            [
                'label' => __( 'Sub Title', 'elements-buddy' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'IT DESIGN & CONSULTING', 'elements-buddy' ),
            ]
        );

        $this->add_control(
            'primary_title',
            [
                'label' => __( 'Primary Title', 'elements-buddy' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Digital Age Adventure In', 'elements-buddy' ),
            ]
        );

        $this->add_control(
            'secondary_title',
            [
                'label' => __( 'Secondary Title', 'elements-buddy' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Marketing', 'elements-buddy' ),
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
                'default' => __( 'More About Us', 'elements-buddy' ),
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
				'selector' => '{{WRAPPER}} .hero-style-1',
			]
		);

        $this->end_controls_section();

        // Title Style

        $this->start_controls_section(
            'title_style',
            [
                'label' => __( 'Title & Subtile Style', 'elements-buddy' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'sub_title_color',
            [
                'label' => __( 'Sub Title Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'   => '#242424',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-area .banner-text .banner-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => __( 'Sub Title Typography', 'elements-buddy' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hero-banner-area .banner-text .banner-subtitle',
            ]
        );

        $this->add_responsive_control(
            'title_color',
            [
                'label' => __( 'Primary Title Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'   => '#233D62',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-area .banner-text .banner-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Primary Title Typography', 'elements-buddy' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hero-banner-area .banner-text .banner-title',
            ]
        );

        $this->add_responsive_control(
            'secondary_title_color',
            [
                'label' => __( 'Secondary Title Color', 'elements-buddy' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'default'   => '#f96520',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-area .banner-text .banner-title span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'secondary_title_typography',
                'label' => __( 'Secondary Title Typography', 'elements-buddy' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hero-banner-area .banner-text .banner-title span',
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
                'default'   => '#485666',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner-area .banner-text .banner-content' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'details_typography',
                'label' => __( 'Details Typography', 'elements-buddy' ),
                'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .hero-banner-area .banner-text .banner-content',
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
					'{{WRAPPER}} .banner-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_border_color',
			[
				'label' => __( 'Border Color', 'elements-buddy' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f96520',
				'selectors' => [
					'{{WRAPPER}} .banner-btn' => 'fill: {{VALUE}}; border: 1px solid {{VALUE}};',
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
					'{{WRAPPER}} .banner-btn' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .banner-btn' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);

        $this->add_responsive_control(
			'button_border_hover_color',
			[
				'label' => __( 'Border Color', 'elements-buddy' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f96520',
				'selectors' => [
					'{{WRAPPER}} .banner-btn' => 'fill: {{VALUE}}; border: 1px solid {{VALUE}};',
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
					'{{WRAPPER}} .banner-btn:hover, {{WRAPPER}} .banner-btn:focus' => 'background-color: {{VALUE}};',
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
    <div class="hero-banner-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-5 order-last order-md-firat">
                    <div class="banner-text">
                    <h3 class="banner-subtitle"><?php echo esc_html($settings['sub_title']); ?></h3>
                    <h1 class="banner-title"><?php echo esc_html($settings['primary_title']); ?> <span><?php echo esc_html($settings['secondary_title']); ?></span></h1>
                    <p class="banner-content"><?php echo esc_html($settings['details']); ?></p>
                    <a href="<?php echo esc_url($settings['button_link']['url']); ?>" class="banner-btn">Our <?php echo esc_html($settings['button_text']); ?> </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 order-first order-md-last">
                    <div class="banner-image">
                    <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_url($settings['image']['url']); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>

   <?php
    }
}
