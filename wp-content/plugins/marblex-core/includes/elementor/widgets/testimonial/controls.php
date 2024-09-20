<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;


class marblex_testi extends Widget_Base {

	public function get_name() {

		return __( 'testimonial', 'marblex-core' );
	}

	public function get_title() {

		return __( 'marblex Testimonial', 'marblex-core' );
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

		return 'eicon-testimonial-carousel';

	}

	protected function register_controls() {

		$this->start_controls_section(

			'section25465dd4',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' => __( 'Testimonial Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
					'2'  => __( 'Style 2', 'marblex-core' ),
					'3'  => __( 'Style 3', 'marblex-core' ),
					'4'  => __( 'Style 4', 'marblex-core' ),
					'5'  => __( 'Style 5', 'marblex-core' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_wwsd',
			[
				'label' => __( 'Testimonial', 'marblex-core' ),
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
			'testi_icon',
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
				'label' => __( 'Client Name ', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is client name', 'marblex-core' ),
				'placeholder' => __( 'Enter Client Name', 'marblex-core' ),
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
			'social_title',
			[
				'label' => __( 'Social Title ', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Simple social title', 'marblex-core' ),
				'placeholder' => __( 'Enter Simple social title', 'marblex-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'star_num',
			[
				'label' => __( 'Ratings', 'intexure-core' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => '5',
				'options' => [
					'1'  => '1 star',
					'2'  => '2 star',
					'3'  => '3 star',
					'4'  => '4 star',
					'5'  => '5 star',
				],
			]
		);


		$repeater->add_control(
			'desg_text',
			[
				'label' => __( 'Designation', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is designation title', 'marblex-core' ),
				'placeholder' => __( 'Enter designation', 'marblex-core' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'description_text',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter your Description here', 'marblex-core' ),
				'placeholder' => __( 'Enter your description', 'marblex-core' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
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
						'title_text' => __( 'Testimonial Box', 'marblex-core' ),
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
					'text-end' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					],
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

		$this->start_controls_section(
			'section__2p08cdacZ1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_all_testi_bgcolor',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'all_testi_bgcolor',
			[
				'label' => __( ' Background Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-box' => 'background-color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'head_name',
			[
				'label' => __( 'Client Name', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'member_name_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-testimonial-box  .pt-testimonial-meta .pt-testmonial-title ',
			]
		);

		$this->add_control(
			'member_name_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-box  .pt-testimonial-meta .pt-testmonial-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'head_designation',
			[
				'label' => __( 'Designation', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Designation_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-testimonial-meta span',
			]
		);

		$this->add_control(
			'Designation_colors',
			[
				'label' => __( 'Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-meta span' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .pt-testimonial-box  .pt-testimonial-content p',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial-box  .pt-testimonial-content p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'section__kkererfre1xx',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings();

		if($settings['testimonial_style'] == '1')
		{
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
		}
		elseif($settings['testimonial_style'] == '2')
		{
			require plugin_dir_path( __FILE__ ) . 'style-2.php';
		}
		elseif($settings['testimonial_style'] == '3')
		{
			require plugin_dir_path( __FILE__ ) . 'style-3.php';
		}
		elseif($settings['testimonial_style'] == '4')
		{
			require plugin_dir_path( __FILE__ ) . 'style-4.php';
		}
		elseif($settings['testimonial_style'] == '5')
		{
			require plugin_dir_path( __FILE__ ) . 'style-5.php';
		}

		if ( Plugin::$instance->editor->is_edit_mode() ) :
			$slider = new Slider_Controls();
			$slider->load_owl_js($this);
		endif;



	}



}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\marblex_testi() );