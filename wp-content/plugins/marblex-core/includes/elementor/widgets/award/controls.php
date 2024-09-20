<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class award_slider extends Widget_Base {

	public function get_name() {
		return __( 'award_slider', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'award slider', 'marblex-core' );
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
		return 'eicon-slider-full-screen';
	}
	protected function register_controls()

	{
		$this->start_controls_section(
			'section',
			[
				'label' => __( 'award_slider', 'marblex-core' ),
			]
		);
		
		$repeater = new Repeater();

		
		$repeater->add_control(
			'tab_image',
			[
				'label' => __( 'Choose Image 1', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,

				],                        
			]
		);
		$repeater->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Award title', 'marblex-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'btn_link',
			[
				'label' => __( 'Link', 'industrie-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'industrie-core' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => __( 'Repeater List', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'img_title' => __( 'Title #1', 'marblex-core' ),
						'tab_image' => __('get_placeholder_image_src()','marblex-core')
						// 'tab_image1' => __('get_placeholder_image_src()','marblex-core')
					],
					
				],
				'title_field' => '{{{ img_title }}}',
			]
		);

		

		$this->add_control(
			'custom_dimension',
			[
				'label' => __( 'Image Dimension', 'plugin-domain' ),
				'type' => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'plugin-name' ),
				'default' => [
					'width' => '',
					'height' => '',
				],
			]
		);


		$this->end_controls_section();
		$this->start_controls_section(
			'section_control_dwde',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);

		$this->end_controls_section();


		$this->start_controls_section(
			'section__2pc5tfdasfsdfre1xx',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();

		 // Style tab start
		$this->start_controls_section(
			'section__2p08cZ1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_title',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-award-title ',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-award-title' => 'color: {{VALUE}};',

				],


			]
		);
		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();

		
		require plugin_dir_path( __FILE__ ) . 'style-1.php';	
		
		



		if ( Plugin::$instance->editor->is_edit_mode() ) :
			$slider = new Slider_Controls();
			$slider->load_owl_js();
		endif;
	}	    

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\award_slider() );
