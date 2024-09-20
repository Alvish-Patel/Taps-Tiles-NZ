<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

 
class price_plan extends Widget_Base {
	public function get_name() {
		return __( 'price_plan', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'Pricing Plan', 'marblex-core' );
	}
	public function get_categories() {
		return [ SCEW::get_category() ];
    }
	/**
	 * Get widget icon.
	 *
	 * Retrieve heading widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_sfnkf',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);
		$this->add_control(
			'price_style',
			[
				'label' => __( 'Price Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
				],
			]
		);

        
        $this->end_controls_section();
		$this->start_controls_section(
			'section_icon',
			[
				'label' => __( 'Pricing Plan', 'marblex-core' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Image1', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				
				'label_block' => true,
				'default' => __( 'Your Title Here', 'marblex-core' ),
			]
		);
	
		$this->add_control(
			'price',
			[
				'label' => __( 'Price', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Enter Price', 'marblex-core' ),
				
			]
		);		
		$this->add_control(
			'price_currency',
			[
				'label' => __( 'Currency', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( '$', 'marblex-core' ),
				
			]
		);
		$this->add_control(
			'price_duration',
			[
				'label' => __( 'Duration', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Monthly', 'marblex-core' ),
				
			]
		);
		$this->add_control(
			'show_button',
			[
				'label' => __( 'Show/Hide button', 'pilelabs' ),
				'type' => Controls_Manager::SWITCHER,
				'yes' => __( 'yes', 'pilelabs' ),
				'no' => __( 'no', 'pilelabs' ),
			]
        );
		
		$this->add_control(
			'active',
			[
				'label' => __( 'Is Active?', 'elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'pilelabs' ),
				'no' => __( 'no', 'pilelabs' ),
			]
		);

		$repeater = new Repeater();


		$repeater->add_control(
			'plan_title',
			[
				'label' => __( 'Plan list info', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
				'default' => __( 'Enter Plan title', 'marblex-core' ),
				
			]
		);

		$repeater->add_control(
			'enable_disable',
			[
				'label' => __( 'Enable/disable', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER ,
				'label_on' => __( 'Show', 'marblex-core' ),
				'label_off' => __( 'Hide', 'marblex-core' ),
				'return_value' => 'yes',
			]
		);

		$repeater->add_control(
			'plan_icons',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
                'fa4compatibility' => 'icon',
				'separator' => 'before',
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => __( 'List Items', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title_text' => __( 'Plan tabs', 'marblex-core' ),
					]
				]
			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p090Z',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		 $this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
				'type' => Controls_Manager::CHOOSE,
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

		// Style
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
				'selector' => '{{WRAPPER}} .pt-pricebox .pt-pricebox-title',
			]
		);
		 
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-pricebox .pt-pricebox-title' => 'color: {{VALUE}};',			
		 		],
				
				
			]
		);


		$this->add_control(
			'head_price',
			[
				'label' => __( 'Price', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-pricebox .dollar',
			]
		);

		$this->add_control(
			'price_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-pricebox .dollar' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-pricebox .dollar' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);

		$this->add_control(
			'head_list_title',
			[
				'label' => __( 'Plan Title', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'listtitle_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-pricebox .pt-list-info li',
			]
		);

		$this->add_control(
			'listtitle_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-pricebox .pt-list-info li' => 'color: {{VALUE}};',
					
		 		],
				
				
			]
		);
			
		 $this->end_controls_section();


		// Add Button
		$this->start_controls_section(
			'section_Jnza43wt8d9QH5b7wefwdhggd7yuyo',
			[
				'label' => __( 'Button', 'marblex-core' ),
				
			]
		);
		$btn = new Button_Controls();
		$btn->get_btn_controls($this);

		$this->start_controls_section(
			'section_y8ubBzdwfwresffgnfgds',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
		$btn = new Button_Controls();
		$btn->get_btn_style($this);
	 // Button End
		 
		 	 
	 // Button End
		$this->start_controls_section(
			'section__2ui6',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		
		$this->add_control(
			'head_sticon',
			[
				'label' => __( 'Price Plan Icon', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sticon_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-pricing-plan .pt-service-media i',
			]
		);	

		$this->add_control(
			'icon_stcolor_dgewd',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-pricing-plan .pt-service-media i' => 'color: {{VALUE}};',

		 		],
		 		
			]
		);


		$this->end_controls_section();

	}
	
	protected function render() {
		$settings = $this->get_settings();
		if($settings['price_style'] == '1')
		{
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
		}
	}	    
	
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\price_plan() );