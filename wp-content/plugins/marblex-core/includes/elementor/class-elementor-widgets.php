<?php
namespace Marblex\Elementor_widgets; 

/**
 * The elementor-widget-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Marblex
 * @subpackage Marblex/includes
 */

/**
 * The elementor-widget-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the elementor-widget-specific stylesheet and JavaScript.
 *
 * @package    Marblex
 * @subpackage Marblex/elementor-widgets
 * @author     Your Name <email@example.com>
 */
class Marblex_Elementor_Init {

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


	public static $widget_category = 'Marblex Widgets';
	public static $woo_widget_category = 'Marblex Woccommerce';
	

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name = '' , $version  = '') {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		if($this->is_elementor_active())
		{
			add_action( 'elementor/widgets/widgets_registered', array( $this , 'register_elementor_widgets') );	
			add_action( 'elementor/init', array( $this , 'add_category' ));
			add_action( 'woocommerce_init', array( $this , 'add_to_cart' ));
		}
		else
		{
			add_action( 'admin_notices', array( $this,'admin_notice' ));	
		}
	}

	public function register_elementor_widgets()
	{
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists('Elementor\Widget_Base') ) {


			 require_once plugin_dir_path( __FILE__ ) . '/helper/slider-controls.php'; 
			 //require_once plugin_dir_path( __FILE__ ) . '/helper/btn_controls.php'; 
			 require_once plugin_dir_path( __FILE__ ) . '/helper/custom-post-data.php'; 

			 //widgets
			 require plugin_dir_path( __FILE__ ) . 'widgets/button/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/section-title/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/fancybox/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/image-box/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/pop-video/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/client/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/testimonial/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/servicebox/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/portfolio-slider/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/blog/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/accordin/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/team/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/award/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/portfolio-grid/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/counter/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/portfolio-mansory/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/portfolio-info/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/timeline/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/home-layout/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/price/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/progress-bar/controls.php'; 
			 require plugin_dir_path( __FILE__ ) . 'widgets/gallery/controls.php'; 

			 if ( class_exists( 'WooCommerce' ) )
			{
				require plugin_dir_path( __FILE__ ) .  '/woocommerce/functions/functions.php';
				require plugin_dir_path( __FILE__ ) .  '/woocommerce/widget/product/product.php';

			}

		}
	}

	public function add_category()
	{
		\Elementor\Plugin::$instance->elements_manager->add_category( 
		self::$widget_category,
		[
			'title' => __( 'Marblex Widgets', 'marblex' ),
			'icon' => 'fa fa-plug',
		]
	 );
		\Elementor\Plugin::$instance->elements_manager->add_category(
			self::$woo_widget_category,
			[
				'title' => __( 'Marblex Woccommerce', 'marblex' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	public static function get_category()
	{
		return self::$widget_category;
	}
	public static function get_woo_category()
	{
		return self::$woo_widget_category;
	}

	public function add_to_cart()
	{
		require plugin_dir_path( __FILE__ ) .  '/woocommerce/cart-ajax.php';

	}


	public function is_elementor_active()
	{
		$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins'));
		if (in_array( 'elementor/elementor.php', $active_plugins ) ) {
			return true;
		}
		else
		{
			return false;
		}
	}

	public function admin_notice()	{
		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'plugin-name' ),
			'<strong>' . esc_html__( 'Plugin Boiler Plate', 'plugin-name' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'plugin-name' ) . '</strong>'
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message );
	}
}

new Marblex_Elementor_Init( );