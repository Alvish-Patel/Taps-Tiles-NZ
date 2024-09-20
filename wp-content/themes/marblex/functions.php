<?php
/**
 * marblex functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage marblex
 * @since marblex 1.0
 */
namespace peaceful\marblex;
class Marblex_Init
{
	public function __construct (){
		$this->constants();
		$this->version_compare();
		$this->load_dependencies();
	}
	 public function load_dependencies()
	 {
	 	
	 	require_once CONST_MARBLEX_DIR . '/inc/theme-setup.php';
        require_once CONST_MARBLEX_DIR . '/inc/theme-helper.php';
        require CONST_MARBLEX_ADMIN_DIR . '/classes/autoload.php';
	 	require_once CONST_MARBLEX_DIR . '/inc/customizer/init.php';
	 }
	 private function constants()
	 {
	 	define('CONST_MARBLEX_DIR', get_template_directory());            
		//raz0r
		update_option( 'pcfq_licence_data', ['data' => ['purchase_key' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'domain_id' => '11', 'activation_code' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx', 'purchase' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx']] );
		update_option( 'envato_purchase_code_41459952', 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx' );
		define('CONST_MARBLEX_URI', get_template_directory_uri());  
		define('CONST_MARBLEX_ADMIN', admin_url());   
		define('CONST_MARBLEX_ADMIN_DIR', get_template_directory() .  '/admin/');  
		define('CONST_MARBLEX_ASSETS_URI', CONST_MARBLEX_URI . '/assets/'); 
	 }
	 private function version_compare()
	 {
	 	if ( version_compare( $GLOBALS['wp_version'], '5.0-alpha', '<' ) ) {
			require CONST_MARBLEX_DIR . '/inc/back-compat.php';
		}
	 }
}
new Marblex_Init;
