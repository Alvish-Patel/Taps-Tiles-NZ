<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Fancybox extends Widget_Base {
	public function get_name() {
		return __( 'fancybox', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Fancybox', 'marblex-core' );
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
		return 'eicon-flip-box';
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_jkhasdessj',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);
		$this->add_control(
			'fancy_style',
			[
				'label' => __( 'Fancybox Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
					'2'  => __( 'Style 2', 'marblex-core' ),
					'3'  => __( 'Style 3', 'marblex-core' ),
					'4'  => __( 'Style 4', 'marblex-core' ),

				],
			]
		);

		$this->add_control(
			'fancy_inner_style',
			[
				'label' => __( 'Fancybox Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'grid'  => __( 'Grid', 'marblex-core' ),
					'slider'  => __( 'Slider', 'marblex-core' ),
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_image414r454',
			[
				'label' => __( 'Fancybox', 'marblex-core' ),
				'condition' => [
					'fancy_inner_style' => ['grid'],
				],
			]
		);
		
		$this->add_control(
			'fancy_icon',
			[
				'label' => __( 'Choose Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
					
				],		
				
			]
		);
		$this->add_control(
			'fancy_second_icon',
			[
				'label' => __( 'Choose Second Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
					
				],
				'condition' => [
					'fancy_style' => '1',
				]		
				
			]
		);


		$this->add_control(
			'fancy_title_text',
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
			'desc_content',
			[
				'label' => __( 'Enable/disable description', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER ,
				'separator' => 'before',
				'label_on' => __( 'Show', 'marblex-core' ),
				'label_off' => __( 'Hide', 'marblex-core' ),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);

		$this->add_control(
			'fancy_description_text',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter your Description here', 'marblex-core' ),
				'placeholder' => __( 'Enter your description', 'marblex-core' ),
				'rows' => 10,
				'show_label' => true,
				'condition' => [
					'desc_content' => 'yes',
				]
			]
		);


		$this->add_control(
			'show_button',
			[
				'label' => __( 'Show/Hide button', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
			]
		);

		$this->end_controls_section();

//slider
		$this->start_controls_section(
			'section_image_slider',
			[
				'label' => __( 'Fancybox', 'marblex-core' ),
				'condition' => [
					'fancy_inner_style' => ['slider'],
				],
			]
		);		
		$repeater = new Repeater();
		
		$repeater->add_control(
			'fancy_icon',
			[
				'label' => __( 'Choose Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
					
				],
				
			]
		);

		$repeater->add_control(
			'fancy_second_icon',
			[
				'label' => __( 'Choose Second Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
					
				],		
				
			]
		);

		$repeater->add_control(
			'fancy_title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sample title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
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
		$repeater->add_control(
			'desc_content',
			[
				'label' => __( 'Enable/disable description', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER ,
				'label_on' => __( 'Show', 'marblex-core' ),
				'label_off' => __( 'Hide', 'marblex-core' ),
				'return_value' => 'yes',
				'default' => 'yes',

			]
		);

		$repeater->add_control(
			'fancy_description_text',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter your Description here', 'marblex-core' ),
				'placeholder' => __( 'Enter your description', 'marblex-core' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
				'condition' => [
					'desc_content' => 'yes',
				]
			]
		);


		$repeater->add_control(
			'show_button',
			[
				'label' => __( 'Show/Hide button', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' => __( 'Button Text', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click Here', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
				'condition' =>[
					'show_button' => 'yes',
				],
			]
		);

		$repeater->add_control(
			'button_icon',
			[
				'label' => __( 'Choose Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'ei-arrow_right',
					'library' => 'solid',
					
				],
				'condition' =>[
					'show_button' => 'yes',
				],	
			]
		);
		
		$repeater->add_control(
			'btn_link',
			[
				'label' => __( 'Link', 'marblex-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'separator' => 'before',
				'condition' =>[
					'show_button' => 'yes',
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
					[
						'list_text' => __( 'List #1', 'marblex-core' ),
					]
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08cZ',
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
					'text-right' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					],

				],

			]
		);
		$this->end_controls_section();


	 // Add Button
		$this->start_controls_section(
			'section_Jnza43wt8d9QH5b77yuyo',
			[
				'label' => __( 'Button', 'marblex-core' ),
				'condition' =>[
					'fancy_inner_style' => 'grid',
					'show_button' => 'yes',
				],
				
			]
		);
		$btn = new Button_Controls();
		$btn->get_btn_controls($this);

		$this->start_controls_section(
			'section_y8ubBzdsfds',
			[
				'label' => __( 'Button Style', 'nutritius-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
			$btn = new Button_Controls();
			$btn->get_btn_style($this);
	 // Button End

		 // Style
		$this->start_controls_section(
			'section__2p08cZ1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_tit_bgdk',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'all_fancy_bg_color',
			[
				'label' => __( ' Background Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-fancy-box' => 'background-color: {{VALUE}};',
				],


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
				'selector' => '{{WRAPPER}} .pt-fancy-box .pt-fancy-box-title,{{WRAPPER}} .pt-fancy-box .pt-fancy-box-info .pt-fancy-box-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-fancy-box .pt-fancy-box-title' => 'color: {{VALUE}};',

				],


			]
		);

		$this->add_control(
			'head_desc',
			[
				'label' => __( 'Description', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-fancy-box .pt-fancy-box-description',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-fancy-box .pt-fancy-box-description' => 'color: {{VALUE}};',

				],


			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08Z1',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_icon',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'icon_size_5128328987',
			[
				'label' => __( 'size', 'marblex-core' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],

				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],

				'selectors' => [
					'{{WRAPPER}} .pt-fancy-box  i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-fancy-box .pt-icon i' => 'color: {{VALUE}};',
				],


			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				'condition' =>[
					'fancy_inner_style' => 'slider',
				],
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);


		$this->end_controls_section();

		$this->start_controls_section(
			'section__2pc2s3dsfre1xx',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' =>[
					'fancy_inner_style' => 'slider',
				],
				
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		if($settings['fancy_style'] == '1')
		{
			
			if($settings['fancy_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-1-grid.php';
			}
			if($settings['fancy_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-1-slider.php';
			}
		}
		if($settings['fancy_style'] == '2')
		{
			
			if($settings['fancy_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-2-grid.php';
			}
			if($settings['fancy_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-2-slider.php';
			}
		}
		if($settings['fancy_style'] == '3')
		{
			
			if($settings['fancy_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-3-grid.php';
			}
			if($settings['fancy_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-3-slider.php';
			}
		}
		if($settings['fancy_style'] == '4')
		{
			
			if($settings['fancy_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-4-grid.php';
			}
			if($settings['fancy_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-4-slider.php';
			}
		}
		
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			$slider = new Slider_Controls();
			$slider->load_owl_js();
		endif;


	}

}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Fancybox() );
