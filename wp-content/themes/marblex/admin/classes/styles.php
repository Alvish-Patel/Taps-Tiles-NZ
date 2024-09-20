<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Pcfq Dynamic Styles
*
*
* @class        Pcfq_Dynamic_Styles
* @version      1.0
* @category     Class
* @author       PeaceFulThemes
*/
class Pcfq_Dynamic_Styles{
	protected static $instance = null;
	private $getduri;
	private $use_minify;
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	public function register_script(){
		$this->getduri = get_template_directory_uri();
		// Register action for Admin
		add_action('admin_enqueue_scripts', array($this,'admin_css') );
		add_action('admin_enqueue_scripts', array($this, 'admin_js') );
		if(Pcfq_Theme_Helper::pcfq_purchase_verify())
		{
			add_action( 'wp_enqueue_scripts', array($this,'enqueue_scripts') , 99);
			add_action( 'wp_enqueue_scripts', array($this,'custom_font_css') , 99);						
		}
	}
	/* Register css for admin panel */
	public function admin_css(){
		// Main admin styles
		wp_enqueue_style('Pcfq-admin', $this->getduri . '/admin/assest/css/admin.css');
	}
	/* Register css and js for admin panel */
	public function admin_js(){
		$currentTheme = wp_get_theme();
        $theme_name = $currentTheme->parent() == false ? wp_get_theme()->get( 'Name' ) : wp_get_theme()->parent()->get( 'Name' );
        $theme_name = trim($theme_name);
        $email = '';
        $purchaseCode = '';
        $domain_id = '';
        $purchase_opt = get_option('pcfq_licence_data');
        if(!empty($purchase_opt))
        {
        	$purchaseCode = $purchase_opt['data']['purchase_key'];
        	$domain_id = $purchase_opt['data']['domain_id'];
        }
	    wp_enqueue_script('Pcfq-admin', $this->getduri . '/admin/assest/js/admin.js');
	    wp_localize_script('Pcfq-admin', 'Pcfq_verify', [
            'ajaxurl' => esc_js(admin_url('admin-ajax.php')),
            'PcfqUrlActivate' => esc_js(Pcfq_Theme_Verify::get_instance()->api),
            'PcfqUrlDeactivate' => esc_js(Pcfq_Theme_Verify::get_instance()->api . 'deactivate'),
            'domainUrl' => esc_js(site_url( '/' )),
            'themeName' => esc_js($theme_name),
            'purchaseCode' => esc_js($purchaseCode),
            'domain_id' => esc_js($domain_id),
            'email' => esc_js($email),
            'message' => esc_js(esc_html__( 'Thank you, your license has been validated', 'marblex' )),
            'ajax_nonce' => esc_js( wp_create_nonce('_notice_nonce') )
		]);
	}

	public function enqueue_scripts()
	{


	wp_enqueue_style( 'marblex-fonts', $this->marblex_fonts_url(), array(), null );
    // Load Bootstrap Javascript.

   
   

	  wp_enqueue_script('bootstrap', CONST_MARBLEX_URI .'/assets/js/bootstrap.min.js', array(), '5.0.2' , true);
	
	
	
	
	wp_enqueue_script('marblex-script', CONST_MARBLEX_URI .'/assets/js/script.js', array('jquery'),'1.0', true);
    // Theme stylesheet.
	
    //Load Bootstrap stylesheet.
	wp_enqueue_style('bootstrap', CONST_MARBLEX_URI .'/assets/css/bootstrap.min.css',array(), '5.0.2', 'all');
	
	
	wp_enqueue_style('animate-min', CONST_MARBLEX_URI .'/assets/css/animate.min.css',array(), '4.0.0', 'all');
	
	wp_enqueue_style('marblex-style', CONST_MARBLEX_URI .'/assets/css/style.css',array(), '1.0', 'all');
	wp_enqueue_style('woocommerce-style', CONST_MARBLEX_URI .'/assets/css/woocommerce.css',array(), '1.0', 'all');
	wp_enqueue_style('marblex-responsive', CONST_MARBLEX_URI .'/assets/css/responsive.css',array(), '1.0', 'all');
	
	


		if (is_singular() && comments_open() && (get_option('thread_comments') == 1))
	    {
	    // Load comment-reply.js (into footer)
			wp_enqueue_script('comment-reply', '/wp-includes/js/comment-reply.min.js', array() , false, true);
		}
	}

	public function custom_font_css(){
		wp_enqueue_style('fontawesome', CONST_MARBLEX_URI.'/assets/css/font-awesome/css/fontawesome.min.css', array(), '5.13.0', 'all');
		wp_enqueue_style('ionicons-icon', CONST_MARBLEX_URI.'/assets/css/fonts/ionicons/ionicons.min.css',array(), '2.0.0', 'all');
		wp_enqueue_style('themify-icons', CONST_MARBLEX_URI.'/assets/css/fonts/themify-icons/themify-icons.css',array(), '2.0.0', 'all');
		wp_enqueue_style('flaticon-collection', CONST_MARBLEX_URI.'/assets/css/fonts/flaticons/flaticon.css',array(), '2.0.0', 'all');
			
	}


	public function marblex_fonts_url() {
	$fonts_url = '';
	/*
	 * translators: If there are characters in your language that are not supported
	 * by Libre Franklin, translate this to 'off'. Do not translate into your own language.
	 */

	$font_families = array();
	$Jost = _x( 'on', 'Jost font: on or off', 'marblex' );
	$Plus_Jakarta_Sans = _x( 'on', 'Plus+Jakarta+Sans font: on or off', 'marblex' );

	if ( 'off' !== $Jost)
	{
		$font_families[] = 'Jost:wght@200;300;400;500;600;700;800;900';
	}


	if ( 'off' !== $Plus_Jakarta_Sans)
	{
		$font_families[] = 'Plus+Jakarta+Sans:wght@200;300;400;500;600;700';
	}

		$query_args = array(
			'family'  =>   implode( '&family=', $font_families ) ,
			'subset'  =>  urlencode('latin,latin-ext' ),
			'display' =>  urlencode('swap' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css2' );
	return  esc_url_raw( $fonts_url  );
}
}
if(!function_exists('Pcfq_Dynamic_Styles')){
    function Pcfq_Dynamic_Styles() {
        return Pcfq_Dynamic_Styles::get_instance();
    }
}
Pcfq_Dynamic_Styles()->register_script();