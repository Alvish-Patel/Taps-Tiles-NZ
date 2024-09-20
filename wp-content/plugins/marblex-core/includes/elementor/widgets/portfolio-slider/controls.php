<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Portfoliobox extends Widget_Base {

	public function get_name() {
		return __( 'portfoliobox', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'portfolio Slider', 'marblex-core' );
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
		return 'eicon-slider-album';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_j897',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);
		$this->add_control(
			'portfolio_style',
			[
				'label' => __( 'Portfolio Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
					'3'  => __( 'Style 3', 'marblex-core' ),
				],
			]
		);

        
        $this->end_controls_section();
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'portfolio', 'marblex-core' ),
			]
		);


		$this->add_control('crop_images',
            array(
                'label'        => esc_html__('Crop Images','marblex-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'true'     => esc_html__( 'yes', 'marblex-core' ),
                'false'    => esc_html__( 'no', 'marblex-core' ),
                'return_value' => 'true',
                
            )
        );
        $this->add_control(
			'crop_height',
			[
				'label' => __( 'height', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Image height', 'marblex-core' ),
				'label_block' => true,
				'condition' => [
					'crop_images' => 'true',
				],
			]
		);
		$this->add_control(
			'crop_weight',
			[
				'label' => __( 'weight', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Image weight', 'marblex-core' ),
				'label_block' => true,
				'condition' => [
					'crop_images' => 'true',
				],

			]
		);
		$this->add_control(
			'hide_button',
			[
				'label' => __( 'Button show', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
				'condition' => [
					'portfolio_style' => '1'
				]
			]
        );

         $this->add_control(
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
				'condition' => [
					'hide_button' => 'yes',
				]
			]
		);

         	$this->add_control(
			'button_icon',
			[
				'label' => __( 'Choose Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'ei-arrow_right',
					'library' => 'solid',
					
				],
				'condition' => [
					'hide_button' => 'yes',
				]	
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'before',
                'default' => __( 'left', 'marblex-core' ),
				'options' => [
					'left' => [
						'title' => __( 'Left', 'marblex-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'marblex-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio' => 'text-align: {{VALUE}}',
				],
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section_hikhdifwfggra',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
			$btn = new Button_Controls();
			$btn->get_btn_style($this);


        $this->start_controls_section(
			'section__2p080Z1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'head_cat',
			[
				'label' => __( 'Category', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		   $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}}  .pt-portfoliobox .pt-portfolio-info .pt-portfolio-link a',
			]
		);

            $this->add_control(
			'title_cat',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox .pt-portfolio-info .pt-portfolio-link a' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}}  .pt-portfoliobox .pt-portfolio-info h5 a',
			]
		);

            $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox .pt-portfolio-info h5 a' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);  

		$this->add_control(
			'title_hov_color',
			[
				'label' => __( 'Hover Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox-1 .pt-portfolio-info h5 a:hover' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);  

		$this->add_control(
			'head_dot',
			[
				'label' => __( 'Owl dot', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'owldotact_color',
			[
				'label' => __( 'Active Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dots .owl-dot.active' => 'background: {{VALUE}};',
		 		],
				
				
			]
		); 

		$this->add_control(
			'owldot_color',
			[
				'label' => __( 'Inactive Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dots .owl-dot' => 'background: {{VALUE}};',
		 		],
				
				
			]
		); 

		$this->add_control(
			'owldot_hover',
			[
				'label' => __( 'Hover Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .owl-carousel .owl-dots .owl-dot:hover' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .pt-portfoliobox .pt-portfolio-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		 
		$this->add_control(
					'icon_color',
					[
						'label' => __( 'Color', 'marblex-core' ),
						
						'type' => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .pt-portfoliobox .pt-portfolio-icon i' => 'color: {{VALUE}};',
				 		],
						
						
					]
				);
		$this->add_control(
		  	'icon_bacground_color',
		  	[
		  		'label' => __( 'Background', 'marblex-core' ),

		  		'type' => Controls_Manager::COLOR,
		  		'selectors' => [
		  			'{{WRAPPER}} .pt-portfoliobox .pt-portfolio-icon i' => 'background: {{VALUE}};',
		  			'{{WRAPPER}} .pt-portfoliobox .pt-portfolio-icon img' => 'background: {{VALUE}};',
		  		],


		  	]
		  );

		 

		 $this->end_controls_section();  

        $this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);
			

		$this->end_controls_section();
	

      
	}
	
	protected function render() {
		$settings = $this->get_settings();
        if($settings['portfolio_style'] == '1')
        {
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
        }
        else if($settings['portfolio_style'] == '3')
        {
			require plugin_dir_path( __FILE__ ) . 'style-3.php';
        }
	

        
        if ( Plugin::$instance->editor->is_edit_mode() ) : 
		$slider = new Slider_Controls();
		$slider->load_owl_js();
		endif; 
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Portfoliobox() );