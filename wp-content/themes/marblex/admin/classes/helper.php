<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Pcfq Theme Helper
*
*
* @class        Pcfq_Theme_Helper
* @version      1.0
* @category     Class
* @author       PeaceFulThemes
*/

if (!class_exists('Pcfq_Theme_Helper')) {
    class Pcfq_Theme_Helper{


        private static $instance = null;

        public function __construct () {  
            add_action( 'admin_init', array($this,'pfcq_restric_page') );
            add_action( 'admin_notices', array($this,'pcfq_domain_change_admin_notice')  );
        }
        public static function get_instance( ) {
            if ( null == self::$instance ) {
                self::$instance = new self( );
            }

            return self::$instance;
        }

        /**
         * Check licence activation
         */
        public static function pcfq_purchase_verify(){
			return true;
            $licence_key = get_option( 'pcfq_licence_data' );
            $licence_key = empty( $licence_key ) ? get_option( Pcfq_Theme_Verify::get_instance()->item_id ) : $licence_key;
            
            if( !empty($licence_key) ){
                if(self::pcfq_if_domain_change())
                {
                    return $licence_key;
                }
                else
                {
                    update_option( 'pcfq_licence_data', '' );
                    update_option( Pcfq_Theme_Verify::get_instance()->item_id, '' );
                    
                }
                
            }
            
            return false;
        }

        public static function pcfq_external_plugin_url($filename = '')
        {
              
            $base_path = 'http://peacefulqode.com/addon/'; 
            if(self::pcfq_purchase_verify())
            {
                return $base_path.$filename.'.zip';
            }    
            else
            {
                return '';
            }   
        }

        public static function pcfq_demo_file_path($filename = '' , $extension = '' , $type = '')
        {
            if(self::pcfq_purchase_verify())
            {
                if($type == 'slider')
                {
                  return CONST_MARBLEX_ADMIN_DIR . '/classes/import/slider/'.$filename.'.'.$extension;  
                }
                if ($type == 'RTL') {
                return CONST_MARBLEX_ADMIN_DIR . '/classes/import/demos/RTL/'.$filename.'.'.$extension;
                                }

                return CONST_MARBLEX_ADMIN_DIR . '/classes/import/demos/demo-1/'.$filename.'.'.$extension;
                
            }
        }

        public static function pcfq_demo_prev_img_url($filename = '' , $extension = '')
        {
            return  CONST_MARBLEX_URI. '/admin/classes/import/demos/demo-1/'.$filename.'.'.$extension;
        }

        public static function pcfq_if_domain_change()
        {
			return true;
            $purchase_opt = get_option( 'pcfq_licence_data' );
            if(isset($purchase_opt['activation_code']))
            {
                if(self::pfcq_get_activation_code($purchase_opt['purchase']) == $purchase_opt['activation_code'])
                {
                  return true;
                }
                else
                {
                    return false;
                }
            }

            return false;
            

        }
        
        public static function pfcq_get_activation_code($purchae_code)
        {
            $url = esc_url(site_url( '/' ));
            $url = trim($url, '/');
            if (!preg_match('#^http(s)?://#', $url)) {
                $url = 'http://' . $url;
            }
            $urlParts = parse_url($url);

            // remove www
            $domain = preg_replace('/^www\./', '', $urlParts['host']);

            return wp_hash( $purchae_code . $domain  );
        }

        public function pcfq_get_assets_path($filename = '' , $extension = '')
        {
            if(self::pcfq_purchase_verify())
            {
                return CONST_MARBLEX_ASSETS_URI . $filename .'.'.$extension;
            }
        }

        public  function pcfq_domain_change_admin_notice() 
        {
            $class = 'notice notice-error';
            $message = __( 'Error! The liecence is not active', 'marblex' );
            
            if(!self::pcfq_if_domain_change())
            {
             printf( '<div class="%1$s"><p><b>%2$s</b></p><a href="%3$s">Click Here</a></div>', esc_attr( $class ), esc_html( $message ) , esc_url(admin_url('admin.php?page=Pcfq-activate-theme-panel')) ); 
            }
        }

        public static function pfcq_restric_page($slug = '')
        {
            $respage = array('tgmpa-install-plugins' , 'pt-one-click-demo-import' , '_xx_options');

            if(isset($_REQUEST['page']) && in_array($_REQUEST['page'] , $respage) )
            {
                if(!self::pcfq_purchase_verify())
                {
                    wp_die(wp_kses('<div class="error notice">
                                <h1>The Licence is not active</h1>
                                <p>Sorry, you are not allowed to view the page.</p>
                                <p>Please activate the licence code.</p>
                                <a href="'.esc_url(admin_url('admin.php?page=Pcfq-activate-theme-panel')).'">             Click Here</a>
                            </div>'));
                }
            }
        }

       
        
    }
    new Pcfq_Theme_Helper();
    
}
 