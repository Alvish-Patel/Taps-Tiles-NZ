<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Custom_Post_Data; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Button_Controls
{
	public function get_btn_controls($obj)
	{
		$custom_post  = new Custom_Post_Data();
		$obj->add_control(
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
					'btn_style!'=> 'btn-icon',
				],
			]
		);

		$obj->add_control(
			'button_icon',
			[
				'label' => __( 'Choose Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'ei-arrow_right',
					'library' => 'solid',
					
				],	
			]
		);

		$obj->add_control(
			'btn_link',
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

		

		$obj->add_responsive_control(
			'button_text_align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default'    => 'left',
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
					'{{WRAPPER}} .pt-btn-container' => 'text-align: {{VALUE}};',
				]
			]
		);

		$obj->end_controls_section();

	}
	public function get_btn_style($obj)
	{
		$obj->add_control(
			'btn_style',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'btn-flat',
				'options' => [
					'btn-flat'  => __( 'Flat', 'marblex-core' ),
					'btn-outline' => __( 'Outline', 'marblex-core' ),
					'btn-link' => __( 'Link', 'marblex-core' ),
					'btn-icon' => __( 'Icon', 'marblex-core' ),
					
				],
			]
		);
		
			


		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-button span.pt-button-text',
				'condition' => [
					'btn_style!'=> ['btn-icon'],
				],
			]
		);

		$obj->start_controls_tabs( 'tabs_button_style' );
		$obj->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'elementor' ),
				'condition' => [
					'btn_style!'=> ['btn-icon'],
				],
			]
		);

		$obj->add_control(
			'circle_color',
			[
				'label' => __( 'Icon Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-button.pt-button-link .pt-svg svg circle, {{WRAPPER}} .pt-button.pt-button-link .pt-svg svg path ' => 'stroke: {{VALUE}};',
				],
				'condition' => [
					'btn_style'=> ['btn-icon','btn-link'],
				],
			]
		);


		$obj->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .pt-button span.pt-button-text , {{WRAPPER}} .pt-button i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'btn_style!'=> ['btn-icon'],
				],
			]
		);
		
		$obj->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-btn-container .pt-button' => 'background: {{VALUE}};',
				],
				'condition' => [
					'btn_style!'=> ['btn-icon','btn-link'],
				],
			]
		);

		$obj->add_control(
			'border_outline_color',
			[
				'label' => __( 'Border Outline Color', 'elementor-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-button ' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'btn_style'=> 'btn-outline',
				],	
				
			]
		);

		$obj->add_control(
			'btn_right_line_color',
			[
				'label' => __( 'Line Color', 'elementor-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-btn-container .pt-button-line-right' => 'background: {{VALUE}};',
				],
				'condition' => [
					'btn_style!'=> ['btn-icon','btn-link'],
				],
			]
		);

		
		$obj->end_controls_tab();
		$obj->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'elementor' ),
				'condition' => [
					'btn_style!'=> ['btn-icon'],
				],
			]
		);
		$obj->add_control(
			'hover_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-button:hover span.pt-button-text , {{WRAPPER}} .pt-button:hover i' => 'color: {{VALUE}};',
				],
				'condition' => [
					'btn_style!'=> ['btn-icon'],
				],
			]
		);
		
		$obj->add_control(
			'button_background_hover_color',
			[
				'label' => __( 'Background Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-button:hover' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'btn_style!'=> ['btn-icon','btn-link'],
				],
			]
		);

		$obj->add_control(
			'border_outline_hcolor',
			[
				'label' => __( ' Out line Color', 'elementor-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-button.pt-button-outline:hover ' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'btn_style'=> 'btn-outline',
				],


			]
		);

		$obj->add_control(
			'btn_right_line_hcolor',
			[
				'label' => __( ' Line Color', 'elementor-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-btn-container .pt-button:hover .pt-button-line-right' => 'background: {{VALUE}};',
				],
				'condition' => [
					'btn_style!'=> ['btn-icon','btn-link'],
				],
			]
		);
		
		
		$obj->end_controls_tab();
		$obj->end_controls_tabs();
		$obj->end_controls_section();

	}
	public function get_slider_btn_controls($obj)
	{
		$custom_post  = new Custom_Post_Data();
		

		$obj->add_responsive_control(
			'button_text_align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default'    => 'left',
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
					'{{WRAPPER}} .pt-btn-container' => 'text-align: {{VALUE}};',
				]
			]
		);

		$obj->end_controls_section();

	}
	
}
