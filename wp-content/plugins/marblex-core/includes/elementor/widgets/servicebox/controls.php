<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Service_Boxes extends Widget_Base {

	public function get_name() {
		return __( 'Service_Box', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Service Box', 'marblex-core' );
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
		return 'eicon-info-box';
	}

	protected function register_controls() {

		$this->start_controls_section(

			'section5456456',

			[

				'label' => __( 'Style', 'marblex-core' ),

			]

		);


		$this->add_control(
			'service_style',
			[
				'label' => __( 'Service box Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style-1', 'marblex-core' ),
					'2'  => __( 'Style-2', 'marblex-core' ),
					'3'  => __( 'Style-3', 'marblex-core' ),
					'4'  => __( 'Style-4', 'marblex-core' ),
					'5'  => __( 'Style-5', 'marblex-core' ),
					'6'  => __( 'Style-6', 'marblex-core' ),
				]
			]
		);
		$this->add_control(
			'service_inner_style',
			[
				'label' => __( 'Grid Or Slider', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,

				'default' => 'slider',
				'options' => [
					'slider'  => __( 'Slider', 'marblex-core' ),
					'grid'  => __( 'Grid', 'marblex-core' ),
				],
				'condition' => [
					'service_style' => ['1','2','3','5'],
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_image21454',
			[
				'label' => __( 'ServiceBox', 'marblex-core' ),
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						['name' => 'service_inner_style', 'operator' => 'in', 'value' => ['slider']],
						['name' => 'service_style', 'operator' => 'in', 'value' => ['4','6']],
					],
				],
			]
		);

		$this->add_control(
			'sub_title_text',
			[
				'label' => __( 'Section Sub Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sub title', 'marblex-core' ),
				'placeholder' => __( 'Enter your sub title', 'marblex-core' ),
				'label_block' => true,
				'condition' => [
					'service_style' => ['6'],
				],
			]
		);
		$this->add_control(
			'section_title_text',
			[
				'label' => __( 'Section Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
				'condition' => [
					'service_style' => ['6'],
				],
			]
		);
		 $this->add_control(
			'section_desc',
			[
				'label' => __( 'Section Description', 'Yot' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Yot' ),
				'placeholder' => __( 'Enter your Description', 'Yot' ),
				'label_block' => true,
				'condition' => [
					'service_style' => ['6'],
				],

			]

        );

		$repeater = new Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Image', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',

			]
		);


		$repeater->add_control(
			'service_icon',
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
			'title_link',
			[
				'label' => __( 'Title Link', 'marblex-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'separator' => 'before',

			]
		);



		$repeater->add_control(
			'service_number',
			[
				'label' => __( 'service number', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( '01', 'marblex-core' ),
				'placeholder' => __( 'Enter your number', 'marblex-core' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'description_text',
			[
				'label' => __( 'Description', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter Your Description Here', 'marblex-core' ),
				'placeholder' => __( 'Enter Your Description', 'marblex-core' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
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
					'tab_title' => __( 'Tab #1', 'marblex-core' ),    					
				]			
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_service',
			[
				'label' => __( 'ServiceBox', 'marblex-core' ),
				'condition' => [
					'service_inner_style' => 'grid',
					'service_style!' => ['4','6'],
				],
			]
		);

		
		$this->add_control(
			'image',
			[
				'label' => __( 'Image', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'condition' => [
					'service_style' => ['1','3','5']
				],

			]
		);

		$this->add_control(
			'service_icon',
			[
				'label' => __( 'Choose Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'service_style' => ['1','5'],
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
			'title_link',
			[
				'label' => __( 'Title Link', 'marblex-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'separator' => 'before',

			]
		);

		$this->add_control(
			'service_number',
			[
				'label' => __( 'service number', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( '01', 'marblex-core' ),
				'placeholder' => __( 'Enter your number', 'marblex-core' ),
				'label_block' => true,
				'condition' => [
					'service_style!' => '3'
				],
			]
		);


		$this->add_control(
			'description_text',
			[
				'label' => __( 'Description', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter Your Description Here', 'marblex-core' ),
				'placeholder' => __( 'Enter Your Description Here', 'marblex-core' ),
				'label_block' => true,
				'condition' => [
					'service_style!' => '3'
				],

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
				'condition' => [
					'service_style' => ['2','5'],
				],
			]
		);
		

		$this->end_controls_section();

		$this->start_controls_section(
			'section_Jnza43ewguerqu',
			[
				'label' => __( 'Button', 'marblex-core' ),
				'condition' =>[
					'service_style' => ['2','5'],
					'service_inner_style' => 'grid',
					'show_button' => 'yes',
				],
				
			]
		);
		$btn = new Button_Controls();
		$btn->get_btn_controls($this);

		$this->start_controls_section(
			'section_y8ubBzdsfdsfaasfe',
			[
				'label' => __( 'Button Style', 'nutritius-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'service_style' => ['2','6'],
				
			]
		);
		$btn = new Button_Controls();
		$btn->get_btn_style($this);
	 // Button End

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
			'service_box_bg_color',
			[
				'label' => __( 'Background', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				
			]
		);

		$this->add_control(
			'service_background_color',
			[
				'label' => __( 'Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-service-box ' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'service_background_hover_color',
			[
				'label' => __( 'Hover Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-service-box:hover' => 'background-color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .pt-service-box .pt-service-title,
				{{WRAPPER}} .pt-service-box .pt-service-box-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-service-box .pt-service-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-service-box .pt-service-box-title' => 'color: {{VALUE}};',

				],


			]
		);

		$this->add_control(
			'head_service_number',
			[
				'label' => __( 'Number', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'service_style!' => '3'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'service_number_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-service-box .pt-service-number',
				'condition' => [
					'service_style!' => '3'
				],
			]
		);

		$this->add_control(
			'service_number_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-service-box .pt-service-number' => 'color: {{VALUE}};',

				],
				'condition' => [
					'service_style!' => '3'
				],


			]
		);

		$this->add_control(
			'head_desc',
			[
				'label' => __( 'Description', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'service_style!' => '3'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-service-box .pt-service-description',
				'condition' => [
					'service_style!' => '3'
				],
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-service-box .pt-service-description' => 'color: {{VALUE}};',


				],
				'condition' => [
					'service_style!' => '3'
				],
				
			]
		);

		$this->add_control(
			'head_icon_redger',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'service_style' => '1'
				],
			]
		);

		$this->add_control(
			'icon_size_iu8987',
			[
				'label' => __( 'Size', 'marblex-core' ),
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
					'{{WRAPPER}} .pt-service-box .pt-service-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'service_style' => '1'
				],

			]
		);


		$this->add_control(
			'icon_color_rgkrg',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-service-box .pt-service-icon i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'service_style' => '1'
				],

			]
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				'condition' => [
					'service_inner_style' => 'slider',
					'service_style!' => ['4','6'],
				],
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);

		$this->end_controls_section();


		$this->start_controls_section(
			'section__2pc5tfdasfre1xx',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' =>[
					'service_inner_style' => 'slider',
					'service_style!' => ['4','6'],
				],
				
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();		

		
	}

	protected function render() {
		$settings = $this->get_settings();

		if($settings['service_style'] == '1')
		{
			if($settings['service_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-1-slider.php';
			}
			elseif($settings['service_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-1-grid.php';
			}

		}
		else if($settings['service_style'] == '2')
		{
			if($settings['service_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-2-slider.php';
			}
			elseif($settings['service_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-2-grid.php';
			}

		}
		else if($settings['service_style'] == '3')
		{
			if($settings['service_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-3-slider.php';
			}
			elseif($settings['service_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-3-grid.php';
			}

		}
		else if($settings['service_style'] == '4')
		{
			require plugin_dir_path( __FILE__ ) . 'style-4-list.php';			
		}
		else if($settings['service_style'] == '5')
		{
			if($settings['service_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-5-slider.php';
			}
			elseif($settings['service_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-5-grid.php';
			}

		}
		else if($settings['service_style'] == '6')
		{
			require plugin_dir_path( __FILE__ ) . 'style-6-slider.php';			
		}
		
		
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			$slider = new Slider_Controls();
			$slider->load_owl_js();
			?>
			
		<?php 
	    endif;
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Service_Boxes() );