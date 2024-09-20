<?php 
namespace peaceful\marblex;
class General_Setup
{
	protected static $instance = null;
	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}
		return self::$instance;
	}
	public function __construct (){
		
		add_action( 'after_setup_theme', array($this,'theme_setup') );
		add_action('wp_loaded', array($this,'prefix_output_buffer_start'));
		add_action( 'widgets_init', array($this,'register_sidebar') );
		add_action('after_setup_theme', function() {
			add_theme_support( 'html5', [ 'script', 'style' ] );

        	//for woocommerce
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
	);
		add_filter( 'upload_mimes', array($this,'custom_mime_types' ));
		add_filter('comment_form_fields', array($this,'customize_comment_field'));
		add_filter( 'wp_nav_menu_objects', array($this,'menu_set_dropdown'), 10, 2 );
		add_filter( 'nav_menu_item_args', array($this,'add_sub_toggles_to_main_menu'), 10, 3 );
		add_filter( 'body_class', array($this, 'body_classes')  );
		add_filter('loop_shop_columns', array($this,'woo_loop_columns'));
		add_action('woocommerce_after_quantity_input_field', array($this, 'marblex_display_quantity_plus'));
		add_action('woocommerce_before_quantity_input_field', array($this, 'marblex_display_quantity_minus'));
		add_action( 'woocommerce_single_product_summary', array($this,  'single_product_share'), 50);		
	}
	
	public function theme_setup(){
		load_theme_textdomain( 'marblex', CONST_MARBLEX_DIR . '/languages' );
		$GLOBALS['content_width'] = 525;

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );
		
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		) );
		register_nav_menus( array(
			'primary'    => esc_html__( 'Primary', 'marblex' ),
			'social' => esc_html__( 'Social Links Menu', 'marblex' ),
			'side_menu' => esc_html__( 'Sidebar Menu', 'marblex' ),
		) );
	}
	public function register_sidebar(){
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'marblex' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'marblex' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Footer  1','marblex'),
			'class'         => 'nav-list',
			'id'            => 'pt_footer_1',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Footer  2','marblex'),
			'class'         => 'nav-list',
			'id'            => 'pt_footer_2',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Footer  3','marblex'),
			'class'         => 'nav-list',
			'id'            => 'pt_footer_3',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Footer  4','marblex'),
			'class'         => 'nav-list',
			'id'            => 'pt_footer_4',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Service Sidebar','marblex'),
			'class'         => 'nav-list',
			'id'            => 'product_page_sidebar',
			'before_widget' => '<div class="widget widget-port">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Filter Above Product','marblex'),
			'class'         => 'nav-list',
			'id'            => 'filter_above_product',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__('Header sidebar','marblex'),
			'class'         => 'nav-list',
			'id'            => 'pt_footer_6',
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="footer-title">',
			'after_title'   => '</h4>',
		) );
	}
	public function customize_comment_field($fields){
		$commenter = wp_get_current_commenter();

		$req      = get_option('require_name_email');
		$aria_req = ($req ? " aria-required='true'" : '');

		$comment_field = $fields['comment'];
		unset($fields['comment']);
		unset($fields['cookies']);
		unset($fields['author']);
		unset($fields['url']);
		unset($fields['email']);

		$fields['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('* Enter Name', 'marblex') . '" required/></p>';

		$fields['email'] = '<p class="comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' placeholder="' . esc_attr__('* Enter Email', 'marblex') . '" required/></p>';

		$fields['url'] = '<p class="comment-form-url"><input id="url" name="url" type="url" value="" size="30" placeholder="' . esc_attr__('Enter Url', 'marblex') . '"></p>';

		$fields['comment'] = $comment_field;
		return $fields;
	}
	public function menu_set_dropdown( $sorted_menu_items, $args ) {
		$last_top = 0;
		foreach ( $sorted_menu_items as $key => $obj ) {
		      // it is a top lv item?
			if ( 0 == $obj->menu_item_parent ) {
		          // set the key of the parent
				$last_top = $key;
			} else {
				$sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
			}
		}
		return $sorted_menu_items;
	}
	public function add_sub_toggles_to_main_menu( $args, $item, $depth ) {
		
		if ( 'primary' === $args->theme_location ) {
			if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
				$args->after = '<i class="fa fa-chevron-down pt-submenu-icon"></i>';
			} else {
				$args->after = '';
			}
		}
		return $args;
	}
	public function body_classes( $classes ) {
		// Add class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		// Add class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
		// Add class if we're viewing the Customizer for easier styling of theme options.
		if ( is_customize_preview() ) {
			$classes[] = 'marblex-customizer';
		}
		// Add class on front page.
		if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
			$classes[] = 'marblex-front-page';
		}
		// Add a class if there is a custom header.
		if ( has_header_image() ) {
			$classes[] = 'has-header-image';
		}
		// Add class if sidebar is used.
		if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
			$classes[] = 'has-sidebar';
		}
		// Add class for one or two column page layouts.
		if ( is_page() || is_archive() ) {
			if ( 'one-column' === get_theme_mod( 'page_layout' ) ) {
				$classes[] = 'page-one-column';
			} else {
				$classes[] = 'page-two-column';
			}
		}
		// Add class if the site title and tagline is hidden.
		if ( 'blank' === get_header_textcolor() ) {
			$classes[] = 'title-tagline-hidden';
		}
		if(is_rtl())
		{
			$classes[] = 'pt-is-rtl';		
		}
		
		

		return $classes;
	}
	public function prefix_output_buffer_start() { 
		ob_start(array($this,"prefix_output_callback")); 
	}
	public function prefix_output_callback($buffer) {
		return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $buffer );
	}
	public function get_the_tag_list()
	{
		$separate_meta = esc_html__( ', ', 'marblex' );



		$tags_list = get_the_tag_list( '', $separate_meta );

		if ( $tags_list && ! is_wp_error( $tags_list ) ) 
		{
			echo '<span class="tags-links"><span class="screen-reader-text">' . esc_html__( 'Tags', 'marblex' ) . '</span>' . $tags_list . '</span>';
		}
	}

	public function marblex_display_quantity_plus()
	{
		echo '<button type="button" class="plus" >+</button>';
	}
	public function marblex_display_quantity_minus()
	{
		echo '<button type="button" class="minus" >-</button>';
	}

	public function custom_mime_types( $mimes ){
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	public function single_product_share(){
		if (!class_exists('ReduxFramework')){
			return;
		}
		?>
		<div class="pt-single-product-share">
			<span class="pt-share-name">Share :</span>
			<ul class="pt-share-itmes">	
				<li class="pt-product-facebook-share">
					<a href="http://www.facebook.com/sharer.php?u=<?php echo the_permalink(); ?>" target="_blank"><span class="pt-product-share-link" ><i class="fab fa-facebook-f"></i></span></a>
				</li>
				<li class="pt-product-twitter-share">
					<a href="http://twitter.com/share?url=<?php echo the_permalink(); ?>" target="_blank"><span class="pt-product-share-link" ><i class="fab fa-twitter"></i></span></a>
				</li>
				<li class="pt-product-google-share">
					<a href="https://plus.google.com/share?url=<?php echo the_permalink(); ?>" target="_blank"><span class="pt-product-share-link" ><i class="fab fa-google-plus"></i></span></a>
				</li>
				<li class="pt-product-linkedin-share">
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink(); ?>" target="_blank"><span class="pt-product-share-link" ><i class="fab fa-linkedin"></i></span></a>
				</li>
			</ul>
		</div>
	<?php }


	public function woo_loop_columns() {
		$pqf_options = get_option('pqf_options');

		if(isset($pqf_options['shop_column_num']) && !empty($pqf_options['shop_column_num']))
		{
			return $pqf_options['shop_column_num'];
		}
		else
		{
	           return 3; // 3 products per row
	       }

	   }

	}
	new General_Setup;