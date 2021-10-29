<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://itech-softsolutions.com/
 * @since      1.0.0
 *
 * @package    Elements_Buddy
 * @subpackage Elements_Buddy/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Elements_Buddy
 * @subpackage Elements_Buddy/public
 * @author     iTech Theme
 */
class Elements_Buddy_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Elements_Buddy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Elements_Buddy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css', array(), '5.1.3', 'all' );
		wp_enqueue_style( 'animated-headline-master', plugin_dir_url( __FILE__ ) . 'css/animated-headline-master.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'elements-buddy-public', plugin_dir_url( __FILE__ ) . 'css/elements-buddy-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Elements_Buddy_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Elements_Buddy_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js', array( 'jquery' ), '5.1.3', false );
		wp_enqueue_script( 'animated-headline-master', plugin_dir_url( __FILE__ ) . 'js/animated-headline-master.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'elements-buddy-public', plugin_dir_url( __FILE__ ) . 'js/elements-buddy-public.js', array( 'jquery' ), $this->version, false );

	}

}
