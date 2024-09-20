<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! defined( 'ABSPATH' ) ) exit;
class Accordion extends Widget_Base {

	public function get_name() {
		return __( 'Accordion', 'marblex-core' );
	}

	public function get_title() {
		return __( 'marblex Accordion', 'marblex-core' );
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
		return 'eicon-accordion';
	}


	public function get_script_depends() {
		return [ '' ];
	 }

	protected function register_controls() {
		$this->start_controls_section(
			'sectionadad',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);
		$this->add_control(
			'accordion_style',
			[
				'label' => __( 'Accordion Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
				],
			]
		);


        $this->end_controls_section();

		$this->start_controls_section(
			'sectionfdf',
			[
				'label' => __( 'Accordion', 'marblex-core' ),
			]
		);



        $repeater = new Repeater();
        $repeater->add_control(
			'tab_title',
			[
				'label' => __( 'Question', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'What is Lorem Ipsum?', 'marblex-core' ),
				'placeholder' => __( 'Tab Title', 'marblex-core' ),
				'label_block' => true,
			]
        );

        $repeater->add_control(
			'tab_content',
			[
				'label' => __( 'Answer', 'marblex-core' ),
				'default' => __( 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'marblex-core' ),
				'placeholder' => __( 'Tab Content', 'marblex-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'show_label' => false,
			]
        );



        $this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => __( 'Tab #1', 'marblex-core' ),
                        'tab_content' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'marblex-core' ),

					]

				],
				'title_field' => '{{{ tab_title }}}',
			]
        );
        $this->add_control(
			'has_icon',
			[
				'label' => __( 'Use Icon?', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'fa4compatibility' => 'icon',
				'default' => 'yes',
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
			]
		);

		$this->add_control(
			'marblex-core_has_box_shadow',
			[
				'label' => __( 'Box Shaow?', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
			]
        );

        $this->add_control(
			'active_icon',
			[
				'label' => __( 'Active Icon', 'marblex-core' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'ion-plus-round'

				],
				'condition' => [
					'has_icon' => 'yes',
				],
				'label_block' => false,
				'skin' => 'inline',


			]
		);
		$this->add_control(
			'inactive_icon',
			[
				'label' => __( 'Inactive Icon', 'marblex-core' ),
				'type' => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'ion-minus-round'

				],
				'condition' => [
					'has_icon' => 'yes',
				],
				'label_block' => false,
				'skin' => 'inline',


			]
		);
		$this->add_responsive_control(
			'icon_position',
			[
				'label' => __( 'Icon Position', 'marblex-core' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'right',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'marblex-core' ),
						'icon' => 'eicon-text-align-left',
					],

					'right' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					],

                ],
                'condition' => [
					'has_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'      => __( 'Title Tag', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'h4',
				'options'    => [

					'h1'          => __( 'h1', 'marblex-core' ),
					'h2'          => __( 'h2', 'marblex-core' ),
					'h3'          => __( 'h3', 'marblex-core' ),
					'h4'          => __( 'h4', 'marblex-core' ),
					'h5'          => __( 'h5', 'marblex-core' ),
					'h6'          => __( 'h6', 'marblex-core' ),


				],
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
					'text-right' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					],
					'text-justify' => [
						'title' => __( 'Justified', 'marblex-core' ),
						'icon' => 'eicon-text-align-justify',
					],
				]
			]
		);

        $this->end_controls_section();



		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs( 'tabs_2a0sGfU' );
         $this->start_controls_tab(
            'tabs_tJ784N2F',
            [
                'label' => __( 'Text Color', 'elementor' ),
            ]
        );
         $this->add_control(
			'title_colors',
			[
				'label' => __( 'Text Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box .ad-title-text' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'title_active_color',
			[
				'label' => __( 'Text Active Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box.pt-active .ad-title-text' => 'color: {{VALUE}};',

				],
			]
		);
		$this->end_controls_tab();

        $this->start_controls_tab(
            'tabs__Ax450e0a',
            [
                'label' => __( 'background Color', 'elementor' ),
            ]
        );
        $this->add_control(
			'title_back_color',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box .ad-title-text' => 'background: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'title_back_active_color',
			[
				'label' => __( 'Active Background Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box.pt-active .ad-title-text' => 'background: {{VALUE}};',

				],
			]
		);

         $this->end_controls_tab();
         $this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_xyxuyu',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_color',
			[
				'label' => __( 'Content Text Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion .pt-accordion-details' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'content_back_color',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion .pt-accordion-details' => 'background: {{VALUE}};',

				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_xhjx',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_active_color',
			[
				'label' => __( 'Active Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box .ad-title-text i.active' => 'color: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'icon_inactive_color',
			[
				'label' => __( 'Inactive Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box .ad-title-text i.inactive' => 'color: {{VALUE}};',

				],
			]
		);
		$this->add_responsive_control(
			'font_size_21Bupaqvc',
			[
				'label' => __( 'Font Size', 'plugin-domain' ),
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
					'{{WRAPPER}} .pt-accordion-box .ad-title-text i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_border_style',
			[
				'label' => __( 'Border', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'has_border',
			[
				'label' => __( 'Border?', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'label_off',
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
			]
        );
        $this->add_control(
			'border_style',
				[
					'label' => __( 'Border Style', 'marblex-core' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'solid'  => __( 'Solid', 'marblex-core' ),
						'dashed' => __( 'Dashed', 'marblex-core' ),
						'dotted' => __( 'Dotted', 'marblex-core' ),
						'double' => __( 'Double', 'marblex-core' ),
						'outset' => __( 'outset', 'marblex-core' ),
						'groove' => __( 'groove', 'marblex-core' ),
						'ridge' => __( 'ridge', 'marblex-core' ),
						'inset' => __( 'inset', 'marblex-core' ),
						'hidden' => __( 'hidden', 'marblex-core' ),
						'none' => __( 'none', 'marblex-core' ),

					],
					'condition' => [
					'has_border' => 'yes',
					],
					'selectors' => [
						'{{WRAPPER}} .pt-accordion-box' => 'border-style: {{VALUE}};',

					],
				]
			);

		$this->add_control(
			'border_active_color',
			[
				'label' => __( 'Active Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box.pt-active' => 'border-color: {{VALUE}};',

				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);

		$this->add_control(
			'border_inactive_color',
			[
				'label' => __( 'Inactive Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box' => 'border-color: {{VALUE}};',

				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);


		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'marblex-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .pt-accordion-box' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'has_border' => 'yes',
				],
			]
		);
		$this->add_control(
			'border_radius_Pa756UR',
			[
				'label' => __( 'Border Radius', 'marblex-core' ),
				'condition' => [
					'has_border' => 'yes',
					],
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}  .pt-accordion-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

			]
		);
		$this->add_responsive_control(
			'margin_21Bupac',
			[
				'label' => __( 'Margin', 'marblex-core' ),
				'condition' => [
					'has_border' => 'yes',
					],
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}  .pt-accordion-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

			]
		);
		$this->add_responsive_control(
			'padding_21Bupac',
			[
				'label' => __( 'Padding', 'marblex-core' ),
				'condition' => [
					'has_border' => 'yes',
					],
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}  .pt-accordion-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],

			]
		);


		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
       if($settings['accordion_style'] == '1')
		{
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
		}

        ?>
        	<script type="text/javascript">
        		 /*------------------------
                Accordion
                --------------------------*/
                jQuery('.pt-accordion-block .pt-accordion-box .pt-accordion-details').hide();
                jQuery('.pt-accordion-block .pt-accordion-box:first').addClass('pt-active').children().slideDown('slow');
                jQuery('.pt-accordion-block .pt-accordion-box').on("click", function() {
                    if (jQuery(this).children('div.pt-accordion-details').is(':hidden')) {
                        jQuery('.pt-accordion-block .pt-accordion-box').removeClass('pt-active').children('div.pt-accordion-details').slideUp('slow');
                        jQuery(this).toggleClass('pt-active').children('div.pt-accordion-details').slideDown('slow');
                    }
                });



        	</script>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Accordion() );