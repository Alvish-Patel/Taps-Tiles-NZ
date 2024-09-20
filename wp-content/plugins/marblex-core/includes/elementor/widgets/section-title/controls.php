<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit; 

class Section_Title extends Widget_Base {

	public function get_name() {
		return __( 'section-title', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Section Title', 'marblex-core' );
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
		return 'eicon-site-title';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_image215ce4',
			[
				'label' => __( 'Section Title', 'marblex-core' ),
			]
		);

		$this->add_control(
			'sub_title_text',
			[
				'label' => __( 'Sub Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sub title', 'marblex-core' ),
				'placeholder' => __( 'Enter your sub title', 'marblex-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
			]
		);
		 $this->add_control(
			'section_desc',
			[
				'label' => __( 'Description', 'Yot' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Yot' ),
				'placeholder' => __( 'Enter your Description', 'Yot' ),
				'label_block' => true,

			]

        );

		 $this->end_controls_section();

		 $this->start_controls_section(
			'section__2eeqp08cZ',
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
				'content_align' => 'text-left',
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
			'section__2p08dfeecZ1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_sub_title',
			[
				'label' => __( 'Sub Title', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sub_title_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-section-title .pt-section-sub-title',
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-section-title .pt-section-sub-title' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .pt-section-title .pt-section-main-title',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-section-title .pt-section-main-title' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .pt-section-title  .pt-section-description',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-section-title  .pt-section-description' => 'color: {{VALUE}};',
				],
			]
		);		


		 $this->end_controls_section();
	}

	protected function render() {
        require plugin_dir_path( __FILE__ ) . 'style-1.php';
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Section_Title() );