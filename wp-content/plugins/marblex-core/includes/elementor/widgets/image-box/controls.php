<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;


class image_box extends Widget_Base {

	public function get_name() {
		return __( 'image_box', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'marblex Image Box', 'marblex-core' );
	}

	public function get_categories() {
		return [ SCEW::get_category() ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_fjhfh248452',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);

		$this->add_control(
			'image_style',
			[
				'label' => __( 'Image Box Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
				],
			]
		);

		$this->add_control(
			'inner_style',
			[
				'label' => __( 'Client Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slider',
				'options' => [
					'slider'  => __( 'Slider', 'marblex-core' ),
					'grid'  => __( 'Grid', 'marblex-core' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_image',
			[
				'label' => __( 'Image Box', 'marblex-core' ),
				'condition' => [
					'inner_style' => ['grid'],
				]
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'marblex-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
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
			'title_link',
			[
				'label' => __( 'Title Link', 'intexure-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'intexure-core' ),

			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title Tag', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h5',
				'options' => [
					'h1'  => 'h1',
					'h2'  => 'h2',
					'h3'  => 'h3',
					'h4'  => 'h4',
					'h5'  => 'h5',
					'h6'  => 'h6',
					'p'  => 'p',
					'span'  => 'span',
				],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_imageafdfdfgh',
			[
				'label' => __( 'Image Box', 'marblex-core' ),
				'condition' => [
					'inner_style' => ['slider'],
				]
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'marblex-core'),
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
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sample title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'title_link',
			[
				'label' => __( 'Title Link', 'intexure-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'intexure-core' ),

			]
		);

		$repeater->add_control(
			'title_tag',
			[
				'label' => __( 'Title Tag', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'h5',
				'options' => [
					'h1'  => 'h1',
					'h2'  => 'h2',
					'h3'  => 'h3',
					'h4'  => 'h4',
					'h5'  => 'h5',
					'h6'  => 'h6',
					'p'  => 'p',
					'span'  => 'span',
				],
			]
		);
		$this->add_control(
			'list_items',
			[
				'label' => __( 'List', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
						'title_text' => __( 'image Box', 'marblex-core' ),
					],
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08cZfsgd',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'text-left',
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'marblex-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'marblex-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-end' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					],

				],

			]
		);
		$this->end_controls_section();
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
				'selector' => '{{WRAPPER}} .pt-image-box .pt-image-box-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-image-box .pt-image-box-title' => 'color: {{VALUE}};',

				],


			]
		);

		$this->end_controls_section();
		  $this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				'condition' => [
					'inner_style' => ['slider'],
				]							
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);


		$this->end_controls_section();

		$this->start_controls_section(
			'section__2pc2s3dsefdeeafsD',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' =>[
					'inner_style' => 'slider',
				],
				
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings_for_display();
		  if($settings['image_style'] == '1')
		{
			 if($settings['inner_style'] == 'slider')
			{
			require plugin_dir_path( __FILE__ ) . 'style-1-slider.php';
			} 
			if($settings['inner_style'] == 'grid')
			{
			require plugin_dir_path( __FILE__ ) . 'style-1-grid.php';
			}  
		} 

		 if ( Plugin::$instance->editor->is_edit_mode() ) :
		$slider = new Slider_Controls();
		$slider->load_owl_js($this);
		endif;

	}

	/**
	 * Render image box widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\image_box() );