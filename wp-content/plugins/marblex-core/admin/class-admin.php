<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://author-marblex.com/
 * @since      1.0.0
 *
 * @package    Marblex
 * @subpackage Marblex/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Marblex
 * @subpackage Marblex/admin
 * @author     author-marblex <author-marblex@gmail.com>
 */
class Marblex_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->load_dependencies();		

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Marblex_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Marblex_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Marblex_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Marblex_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	}
	public function load_dependencies()
	{
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/custom-post/custom-post.php';
		require plugin_dir_path( dirname( __FILE__ ) ) . 'admin/icon/icon.php';

	}
	

}
