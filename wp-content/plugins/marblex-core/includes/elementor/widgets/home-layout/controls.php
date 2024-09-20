<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class home_layout extends Widget_Base {

	public function get_name() {
		return __( 'home_layout', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Home Layout', 'marblex-core' );
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
		return 'eicon-lock-user';
	}

	protected function register_controls(){


		$this->start_controls_section(
			'section_asdseffsd',
			[
				'label' => __( 'Home Layout', 'marblex-core' ),		
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);

		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sample title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
			]
		);

		
		$this->add_control(
			'grid_btn_link',
			[
				'label' => __( 'Link', 'marblex-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'separator' => 'before',

			]
		);



		$this->end_controls_section();
		
		

	}

	protected function render() {

		$settings = $this->get_settings();

		require plugin_dir_path( __FILE__ ) . 'style-1.php';
		


	}

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\home_layout() );
