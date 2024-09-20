<?php
class Marblex_Custom_Icons
{
	 public function __construct()
    {
        add_filter( 'elementor/icons_manager/additional_tabs' , array($this , 'add_icon'));
        add_action('elementor/editor/before_enqueue_scripts' , array($this , 'enqueue_styles'));

    }

    public function add_icon()
    {
    	return [
	       'themify-icons' => [
			'name' => 'themify-icons',
			'label' => __( 'Themefy Icons', 'marblex-core' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => '',
			'displayPrefix' => '',
			'labelIcon' => 'ti-wand',
			'ver' => '1.0',
			'fetchJson' => MARBLEX_CORE_URL.'/public/css/vendor/font/themify-icons/themify-icons.js',
			'native' => true,
         	],
         	'flaticons' => [
			'name' => 'flaticon-icons',
			'label' => __( 'Flaticon Icons', 'marblex-core' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => '',
			'displayPrefix' => '',
			'labelIcon' => 'flaticon-bathroom',
			'ver' => '2.0',
			'fetchJson' => MARBLEX_CORE_URL.'/public/css/vendor/font/flaticons/flaticon-icons.js',
			'native' => true,
         	],
         	'ion-ionicons' => [
			'name' => 'ion-ionicons',
			'label' => __( 'Ionic Icons', 'nutritius-core' ),
			'url' => '',
			'enqueue' => '',
			'prefix' => 'ion-',
			'displayPrefix' => 'ion',
			'labelIcon' => 'ion ion-android-add',
			'ver' => '1.0',
			'fetchJson' => MARBLEX_CORE_URL.'/public/css/vendor/font/ionicons/ionicons.js',
			'native' => true,
        	],
        ];
    }

    public function enqueue_styles()
    {

		$fonts = new Pcfq_Dynamic_Styles;
    	$fonts->custom_font_css();
    	
    }
}
new Marblex_Custom_Icons;
