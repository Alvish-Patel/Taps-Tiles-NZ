<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Pcfq_Theme_Panel
*
*
* @class        Pcfq_Theme_Panel
* @version      1.0
* @category Class
* @author       PeaceFulThemes
*/

if (!class_exists('Pcfq_Theme_Panel')) {
    class Pcfq_Theme_Panel{

        /**
        * @access      private
        * @var         \Pcfq_Theme_Panel $instance
        * @since       3.0.0
        */
        private static $instance;

        /**
        * Get active instance
        *
        * @access      public
        * @since       3.1.3
        * @return      self::$instance
        */
       

        // Shim since we changed the function name. Deprecated.
        public static function get_instance() {
            if ( ! self::$instance ) {
                self::$instance = new self;
                self::$instance->hooks();
            }

            return self::$instance;
        }

        private function hooks(){
           
            add_action( 'admin_menu', array( $this, 'theme_panel_admin_menu' ));
            add_action( 'admin_init', array( $this, 'theme_redirect' ) );
        }

        public function theme_panel_admin_menu(){
            if(Pcfq_Theme_Helper::pcfq_purchase_verify())
            {
                $icon_path = get_template_directory_uri() . '/admin/assest/img/verified.png';
            }  
            else
            {
               $icon_path =  get_template_directory_uri() . '/admin/assest/img/unverified.png';
            }
            add_menu_page (
                esc_html__('Acticate', 'marblex'),
                esc_html__('Activate', 'marblex'), 
                'manage_options', // capability
                'Pcfq-dashboard-panel',  // menu-slug
                array( $this, 'theme_panel_welcome_render' ),   // function that will render its output
                $icon_path,    // link to the icon that will be displayed in the sidebar
                2    // position of the menu option
            );
            $submenu = array();
            $submenu[] = array(
                esc_html__('Welcome', 'marblex'),    //page_title
                esc_html__('Welcome', 'marblex'),    //menu_title
                'manage_options',                               //capability
                'Pcfq-dashboard-panel',                          //menu_slug
                array( $this, 'theme_panel_welcome_render' ),   // function that will render its output
            );

            $submenu[] = array(
                esc_html__('Activate Theme', 'marblex'),   //page_title
                esc_html__('Activate Theme', 'marblex'),   //menu_title
                'edit_posts',                           //capability
                'Pcfq-activate-theme-panel',             //menu_slug
                array( $this, 'theme_activate' ),       // function that will render its output
            );

             $submenu[] = array(
                esc_html__('Requirements', 'marblex'),   //page_title
                esc_html__('Requirements', 'marblex'),   //menu_title
                'edit_posts',                          //capability
                'Pcfq-status-panel',                   //menu_slug
                array( $this, 'theme_status' ),       // function that will render its output
            );    


            if (current_user_can( 'activate_plugins' )):
                $submenu[] = array(
                    esc_html__('Theme Plugins', 'marblex'),   //page_title
                    esc_html__('Theme Plugins', 'marblex'),   //menu_title
                    'edit_posts',                          //capability
                    'Pcfq-plugins-panel',                   //menu_slug
                    array( $this, 'theme_plugins' ),       // function that will render its output
                );
            endif;

            $submenu[] = array(
                esc_html__('Help Center', 'marblex'),   //page_title
                esc_html__('Help Center', 'marblex'),   //menu_title
                'edit_posts',                           //capability
                'Pcfq-theme-helper-panel',             //menu_slug
                array( $this, 'theme_helper' ),       // function that will render its output
            );             
            

            $submenu = apply_filters('Pcfq_panel_submenu', array( $submenu ) );
            
            foreach ($submenu[0] as $key => $value) {
                add_submenu_page(
                    'Pcfq-dashboard-panel',               //parent menu slug
                    $value[0],                           //page_title
                    $value[1],                           //menu_title
                    $value[2],                           //capability
                    $value[3],                           //menu_slug
                    $value[4]                            //function that will render its output
                );
            }
        }

        public function dashboard_menu_tab(){
            global $submenu;

            $menu_items = '';

            if (isset($submenu['Pcfq-dashboard-panel'])):
              $menu_items = $submenu['Pcfq-dashboard-panel'];
            endif;

            if (!empty($menu_items)) : 
            ?>
              <div class="Pcfq-notify wrap">
                <div class="nav-tab-wrapper">
                  <?php foreach ($menu_items as $item): 
                    $class = isset($_GET['page']) && $_GET['page'] == $item[2] ? ' nav-tab-active' : '';
                    ?>
                    <a href="<?php echo esc_url(admin_url('admin.php?page='.$item[2].''));?>" 
                        class="nav-tab<?php echo esc_attr($class);?>"
                    >
                        <?php echo esc_html($item[0]); ?>
                            
                    </a>
                  <?php endforeach; ?>
                </div>
              </div> 
            <?php endif;             
        }

        public function theme_panel_welcome_render(){
            
            $this->dashboard_menu_tab();

            /**
             * Template View Welcome
             */
            require_once CONST_MARBLEX_ADMIN_DIR . '/dashboard/tpl-weclome.php';
            
        }

        public function theme_plugins(){
            
            $this->dashboard_menu_tab();

            /**
             * Template View Plugin
             */
            require_once CONST_MARBLEX_ADMIN_DIR . '/dashboard/tpl-plugins.php';
            
        }
        
        public function theme_status(){
            
            $this->dashboard_menu_tab();

            /**
             * Template View Plugin
             */
            require_once CONST_MARBLEX_ADMIN_DIR . '/dashboard/tpl-status.php';
            

        }        

        public function theme_activate(){
            
            $this->dashboard_menu_tab();

            /**
             * Template View Plugin
             */
            require_once CONST_MARBLEX_ADMIN_DIR . '/dashboard/tpl-activate.php';
            
        }        

        public function theme_helper(){
            
            $this->dashboard_menu_tab();

            /**
             * Template View Plugin
             */
            require_once CONST_MARBLEX_ADMIN_DIR . '/dashboard/tpl-helper.php';
            
        }

        

        public function theme_redirect() {
            global $pagenow;
            if ( is_admin() && isset( $_GET['activated'] ) && 'themes.php' === $pagenow ) {
                wp_safe_redirect( esc_url(admin_url( 'admin.php?page=Pcfq-dashboard-panel' )) );
                exit;
            }
        }

    }
}

Pcfq_Theme_Panel::get_instance();
