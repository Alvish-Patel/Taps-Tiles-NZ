<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit; 
class Marblex_Button extends Widget_Base {
	public function get_name() {
		return __( 'Button', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'Button', 'marblex-core' );
	}
	public function get_categories() {
		return [ SCEW::get_category() ];
    }
	
	/**
	 * Get widget icon.
	 *
	 * Retrieve counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-button';
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_Jnza43wt8d9QH5b77duo',
			[
				'label' => __( 'Button', 'marblex-core' ),
			]
		);

		$btn = new Button_Controls();
		$btn->get_btn_controls($this);

		$this->start_controls_section(
			'section_y8ubBfbAH1e2VwpN5be9dfd',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
			$btn = new Button_Controls();
			$btn->get_btn_style($this);
		
	}
	
	protected function render() {
		$settings = $this->get_settings();
        require plugin_dir_path( __FILE__ ) . 'style.php';	
    }	    
		
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Marblex_Button() );