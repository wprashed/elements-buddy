<?php

/**
 *
 * @link              https://itech-softsolutions.com/
 * @since             1.0.0
 * @package           Elements_Buddy
 *
 * @wordpress-plugin
 * Plugin Name:       Elements Buddy
 * Plugin URI:        https://itech-softsolutions.com/plugin
 * Description:       Elements Buddy is a set of slick and effective widgets that works seamlessly with Elementor page builder.
 * Version:           1.0.0
 * Author:            iTech Theme
 * Author URI:        https://itech-softsolutions.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elements-buddy
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0
 */
define( 'ELEMENTS_BUDDY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elements-buddy-activator.php
 */
function activate_elements_buddy() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elements-buddy-activator.php';
	Elements_Buddy_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elements-buddy-deactivator.php
 */
function deactivate_elements_buddy() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-elements-buddy-deactivator.php';
	Elements_Buddy_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_elements_buddy' );
register_deactivation_hook( __FILE__, 'deactivate_elements_buddy' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-elements-buddy.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elements_buddy() {

	$plugin = new Elements_Buddy();
	$plugin->run();
}

final class elementsbuddy {

    /**
     * Plugin Version
     *
     * @since 1.2.0
     * @var string The plugin version.
     */
    const VERSION = '1.2.0';

    /**
     * Minimum Elementor Version
     *
     * @since 1.2.0
     * @var string Minimum Elementor version required to run the plugin.
     */
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    /**
     * Minimum PHP Version
     *
     * @since 1.2.0
     * @var string Minimum PHP version required to run the plugin.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Constructor
     *
     * @since 1.0.0
     * @access public
     */
    public function __construct() {

        // Load translation
        add_action( 'init', array( $this, 'i18n' ) );

        // Init Plugin
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    /**
     * Load Textdomain
     *
     * Load plugin localization files.
     * Fired by `init` action hook.
     *
     * @since 1.2.0
     * @access public
     */
    public function i18n() {
        load_plugin_textdomain( 'elements-buddy', plugins_url() . '/languages' );
    }

    /**
     * Initialize the plugin
     *
     * Validates that Elementor is already loaded.
     * Checks for basic plugin requirements, if one check fail don't continue,
     * if all check have passed include the plugin class.
     *
     * Fired by `plugins_loaded` action hook.
     *
     * @since 1.2.0
     * @access public
     */

    public function init() {

        // Check if Elementor installed and activated
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        // Check for required Elementor version
        if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        // Check for required PHP version
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles'] );
        add_action( "elementor/frontend/after_enqueue_scripts", [ $this, 'widget_fronted_scripts' ] );

        // Once we get here, We have passed all validation checks so we can safely include our plugin
        require_once( 'plugin.php' );
    }

    function widget_fronted_scripts(){
        wp_enqueue_script("bootstrap-js",plugins_url("/assets/js/bootstrap.min.js",__FILE__),array('jquery'),'5.0.0',true);
        wp_enqueue_script("plugin-collection-js",plugins_url("/assets/js/jquery-plugin-collection.js",__FILE__),array('jquery'),'1.0',true);
        wp_enqueue_script("script-js",plugins_url("/assets/js/script.js",__FILE__),array('jquery'),'1.0',true);
    }

    function widget_styles(){
        wp_enqueue_style("animate-css-css", plugins_url("/assets/css/animate.css", __FILE__));
        wp_enqueue_style("bootstrap-css", plugins_url("/assets/css/bootstrap.min.css", __FILE__));
        wp_enqueue_style("bootstrap-touchspin-css", plugins_url("/assets/css/bootstrap-touchspin.css", __FILE__));
        wp_enqueue_style("flaticon-css", plugins_url("/assets/css/flaticon.css", __FILE__));
        wp_enqueue_style("fancybox-css", plugins_url("/assets/css/jquery.fancybox.css", __FILE__));
        wp_enqueue_style("magnific-css", plugins_url("/assets/css/magnific-popup.css", __FILE__));
        wp_enqueue_style("odometer-css", plugins_url("/assets/css/odometer-theme-default.css", __FILE__));
        wp_enqueue_style("carousel-css", plugins_url("/assets/css/owl.carousel.css", __FILE__));
        wp_enqueue_style("owl-theme-css", plugins_url("/assets/css/owl.theme.css", __FILE__));
        wp_enqueue_style("transitions-css", plugins_url("/assets/css/owl.transitions.css", __FILE__));
        wp_enqueue_style("slick-css", plugins_url("/assets/css/slick.css", __FILE__));
        wp_enqueue_style("slick-theme-css", plugins_url("/assets/css/slick-theme.css", __FILE__));
        wp_enqueue_style("style-css", plugins_url("/assets/css/style.css", __FILE__));
        wp_enqueue_style("swiper-css", plugins_url("/assets/css/swiper.min.css", __FILE__));
        wp_enqueue_style("themify-css", plugins_url("/assets/css/themify-icons.css", __FILE__));
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_missing_main_plugin() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor */
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elements-buddy' ),
            '<strong>' . esc_html__( 'Elements Buddy', 'elements-buddy' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elements-buddy' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_elementor_version() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elements-buddy' ),
            '<strong>' . esc_html__( 'Elements Buddy', 'elements-buddy' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elements-buddy' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

    /**
     * Admin notice
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     * @access public
     */
    public function admin_notice_minimum_php_version() {
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
        /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elements-buddy' ),
            '<strong>' . esc_html__( 'Elements Buddy', 'elements-buddy' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'elements-buddy' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
    }

}

new elementsbuddy();

run_elements_buddy();
