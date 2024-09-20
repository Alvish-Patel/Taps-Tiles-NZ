<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Counter extends Widget_Base {

	public function get_name() {
		return __('marblex_counter', 'marblex-core');
	}

	public function get_title() {
		return __('Marblex Counter', 'marblex-core');
	}

	public function get_categories() {
		return [ SCEW::get_category() ];
    }

	/**
	 * Get widget icon.
	 *
	 * Retrieve button widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-counter';
	}

	protected function register_controls() {
      $this->start_controls_section(
			'sectionsfsdfs',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);
		$this->add_control(
			'counter_style',
			[
				'label' => __( 'Counter Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
				],
			]
		);

        
        $this->end_controls_section();
		
		$this->start_controls_section(
			'sectionwrw',
			[
				'label' => __('Counter', 'marblex-core'),
			]
		);

		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => ['value' => 'ion ion-play',
					],
                'fa4compatibility' => 'icon',
				'separator' => 'before',
				
			]
		);

		$this->add_control(
			'title_number',
			[
				'label' => __('Number', 'marblex-core'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('59', 'marblex-core'),
				'placeholder' => __('Enter your Number', 'marblex-core'),
				'label_block' => true,
			]
		);

		 $this->add_control(
			'show_prefix',
			[
				'label' => __( 'Show Prefix', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'marblex-core' ),
				'label_off' => __( 'Hide', 'marblex-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'counter_prefix',
			[
				'label' => __('Counter Prefix', 'marblex-core'),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __('+', 'marblex-core'),
				'placeholder' => __('Enter Prefix', 'marblex-core'),
				'label_block' => true,
				'condition' => ['show_prefix' => 'yes']
			]
		);

		
		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'marblex-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'amazing projects done' ),
				'placeholder' => __( 'Enter your description', 'marblex-core' ),
				'separator' => 'none',
				'rows' => 10,
				'show_label' => false,
				
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

		$this->start_controls_section(
			'section__2p08cZ1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'head_num',
			[
				'label' => __( 'Number', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		   $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}}  .pt-counter .pt-counter-info .pt-counter-num-prefix .timer',
			]
		);

            $this->add_control(
			'title_num',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-counter .pt-counter-info .pt-counter-num-prefix .timer' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);

         $this->add_control(
			'head_prex',
			[
				'label' => __( 'Prefix', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);   

         $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'prefix_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}}  .pt-counter .pt-counter-info .pt-counter-num-prefix .pt-counter-prefix',
			]
		);


             $this->add_control(
			'prefixnum',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-counter .pt-counter-info .pt-counter-num-prefix .pt-counter-prefix' => 'color: {{VALUE}};',
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
				'name' => 'descrition_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-counter .pt-counter-info .pt-counter-description',
			]
		);
		
		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-counter .pt-counter-info .pt-counter-description ' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);
		
		
		 $this->end_controls_section();

		 $this->start_controls_section(
			'section__2p08Zt',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		 $this->add_control(
			'icon_size_5128328987',
			[
				'label' => __( 'Typography', 'marblex-core' ),
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
					'{{WRAPPER}}  .pt-counter .pt-counter-media i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		  $this->add_control(
			'icon',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-counter .pt-counter-media i' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);   

		  $this->end_controls_section();

 
	}

	protected function render() {
	   $settings = $this->get_settings();
       require plugin_dir_path( __FILE__ ) . 'style-1.php';
	
		if (Plugin::$instance->editor->is_edit_mode()): ?>

		<script>
			 jQuery('.timer').countTo();
		</script>

		<?php endif;
	}

}

Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Counter());