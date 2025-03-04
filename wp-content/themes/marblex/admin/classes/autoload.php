<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Pcfq Theme Autoload
*
*
* @class        Pcfq_Theme_Autoload
* @version      1.0
* @category Class
* @author       PeaceFulThemes
*/

if (!class_exists('Pcfq_Theme_Autoload')) {
    class Pcfq_Theme_Autoload{

        private static $instance = null;
        public static function get_instance( ) {
            if ( null == self::$instance ) {
                self::$instance = new self( );
            }

            return self::$instance;
        }

        public function __construct () {           
          
            $this->load_dependencies();

            
        }


        public function load_dependencies(){
            
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/helper.php';
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/verify.php';
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/styles.php';
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/panel.php';
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/import/demo-import.php';
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/tgm/class-tgm-plugin-activation.php';
            require_once CONST_MARBLEX_ADMIN_DIR . '/classes/tgm/required_plugin.php';
            
        }
        
    }
    new Pcfq_Theme_Autoload();
}
