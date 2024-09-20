<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;


class marblex_Portfolio_info extends Widget_Base {

	public function get_name() {
		return __( ' marblex_portfolio_info', 'xxxx-core' );
	}

	public function get_title() {
		return __( 'Portfolio Info', 'xxxx-core' );
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
		return 'eicon-editor-list-ul';
	}
	protected function register_controls() {
		$this->start_controls_section(
			'list_section',
			[
				'label' => __( 'Portfolio Info', 'xxxx-core' ),
			]
		);


		$this->add_control(
			'list_main_item_title',
			[
				'label' => __( 'Main Title', 'xxxx-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'List Item', 'xxxx-core' ),
				'default' => __( 'List Item', 'xxxx-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'info_description',
			[
				'label' => __( 'Description', 'xxxx-core' ),
				'type' => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => __( 'List Item', 'xxxx-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater = new Repeater();

        $repeater->add_control(
			'list_item_title',
			[
				'label' => __( 'Title', 'xxxx-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'List Item', 'xxxx-core' ),
				'default' => __( 'List Item', 'xxxx-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'list_item_sub_title',
			[
				'label' => __( 'Info', 'xxxx-core' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'List Item', 'xxxx-core' ),
				'default' => __( 'List Item', 'xxxx-core' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

		 $this->add_control(
			'list',
			[
				'label' => __( 'List', 'xxxx-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_item' => __( 'List 1', 'xxxx-core' ),

					]

				]
			]
		);






		$this->end_controls_section();

		// Style
		 $this->start_controls_section(
			'section__2p08cZ1',
			[
				'label' => __( 'Content', 'xxxx-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		 $this->add_control(
			'head_title',
			[
				'label' => __( 'Title', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-portfolio-info-box h5',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio-info-box h5' => 'color: {{VALUE}};',


		 		],


			]
		);

		$this->add_control(
			'head_desc',
			[
				'label' => __( 'Description', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-portfolio-info-box p',

			]
		);

		$this->add_control(
			'desc_title_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio-info-box p' => 'color: {{VALUE}};',
		 		],


			]
		);

		$this->add_control(
			'head_list_heading',
			[
				'label' => __( 'List heading', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',

			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_head_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-portfolio-info-box .pt-porfolio-info ul li h5',
			]
		);

		$this->add_control(
			'list_head_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio-info-box .pt-porfolio-info ul li h5' => 'color: {{VALUE}};',
		 		],


			]
		);

		$this->add_control(
			'head_list_title',
			[
				'label' => __( 'List Title', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_title_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-portfolio-info-box .pt-porfolio-info ul li span',
			]
		);

		$this->add_control(
			'ls_title_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio-info-box .pt-porfolio-info ul li span' => 'color: {{VALUE}};',

		 		],


			]
		);

		 $this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
       require plugin_dir_path( __FILE__ ) . 'style-1.php';
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\marblex_Portfolio_info() );