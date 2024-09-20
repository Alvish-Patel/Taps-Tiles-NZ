<?php
namespace Elementor; 
use Opticeye\Elementor_widgets\Opticeye_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit; 


class optic_testi extends Widget_Base {

	public function get_name() {

		return __( 'testimonial', 'opticeye-core' );
	}

	public function get_title() {

		return __( 'opticeye Testimonial', 'opticeye-core' );
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
				'label' => __( 'Style', 'opticeye-core' ),
			]
		);

		$this->add_control(
			'testimonial_style',
			[
				'label' => __( 'Testimonial Style', 'opticeye-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'opticeye-core' ),
					'2'  => __( 'Style 2', 'opticeye-core' ),
					'3'  => __( 'Style 3', 'opticeye-core' ),
					'4'  => __( 'Style 4', 'opticeye-core' ),
					'5'  => __( 'Style 5', 'opticeye-core' ),
					'6'  => __( 'Style 6', 'opticeye-core' ),
				],
			]
		);

		$this->add_control(
			'testimonial_inner_style',
			[
				'label'      => __( 'Choose style', 'opticeye-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'slider',
				'options'    => [
					'slider'       => __( 'Slider', 'opticeye-core' ),
					'grid'          => __( 'Grid', 'opticeye-core' ),
				],
				'condition' => [
					'testimonial_style' => '4',
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_wwsdfssd',
			[
				'label' => __( 'Testimonial', 'opticeye-core' ),
				'condition' => [
					'testimonial_inner_style' => 'grid',
					'testimonial_style' => '4',
				]
			]
		);

		$this->add_control(
			'testimonial_image',
			[
				'label' => __( 'Image', 'opticeye-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],

			]
		);


		$this->add_control(
			'head_comment',
			[
				'label' => __( 'Head Comment', 'opticeye-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is comment text', 'opticeye-core' ),
				'placeholder' => __( 'Enter comment text', 'opticeye-core' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'title_text',
			[
				'label' => __( 'Client Name ', 'opticeye-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is client name', 'opticeye-core' ),
				'placeholder' => __( 'Enter Client Name', 'opticeye-core' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title Tag', 'opticeye-core' ),
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
			'desg_text',
			[
				'label' => __( 'Designation', 'opticeye-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is designation title', 'opticeye-core' ),
				'placeholder' => __( 'Enter designation', 'opticeye-core' ),
				'label_block' => true,
			]
		);


		$this->add_control(
			'description_text',
			[
				'label' => __( 'Content', 'opticeye-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter your Description here', 'opticeye-core' ),
				'placeholder' => __( 'Enter your description', 'opticeye-core' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_wwsd',
			[
				'label' => __( 'Testimonial', 'opticeye-core' ),
				'conditions' => [
					'relation' => 'or',

					'terms' => [
						['name' => 'testimonial_inner_style', 'operator' => 'in', 'value' => ['slider']],
						['name' => 'testimonial_style!', 'operator' => 'in', 'value' => ['1','2','3','5','6']],
					],
				],
			]
		);


		$repeater = new Repeater();

		$repeater->add_control(
			'testimonial_image',
			[
				'label' => __( 'Image', 'opticeye-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],

			]
		);

		$repeater->add_control(
			'testimanial_icon',
			[
				'label' => __( 'Choose Icon', 'opticeye-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',

				],
			]
		);

		$repeater->add_control(
			'head_comment',
			[
				'label' => __( 'Head Comment', 'opticeye-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is comment text', 'opticeye-core' ),
				'placeholder' => __( 'Enter comment text', 'opticeye-core' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'title_text',
			[
				'label' => __( 'Client Name ', 'opticeye-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is client name', 'opticeye-core' ),
				'placeholder' => __( 'Enter Client Name', 'opticeye-core' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'title_tag',
			[
				'label' => __( 'Title Tag', 'opticeye-core' ),
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
				'label' => __( 'Designation', 'opticeye-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is designation title', 'opticeye-core' ),
				'placeholder' => __( 'Enter designation', 'opticeye-core' ),
				'label_block' => true,
			]
		);


		$repeater->add_control(
			'description_text',
			[
				'label' => __( 'Content', 'opticeye-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter your Description here', 'opticeye-core' ),
				'placeholder' => __( 'Enter your description', 'opticeye-core' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
			]
		);

		

		
		$this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'opticeye-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title_text' => __( 'client name', 'opticeye-core' ),
					]
				]
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'section__2p08cZ',
			[
				'label' => __( 'Alignment', 'opticeye-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'content_align',
			[
				'label' => __( 'Alignment', 'opticeye-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'text-left',
				'options' => [
					'text-left' => [
						'title' => __( 'Left', 'opticeye-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'opticeye-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'text-end' => [
						'title' => __( 'Right', 'opticeye-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'opticeye-core' ),
				'condition' => [
					'testimonial_inner_style' => 'slider',
					'testimonial_style!' => '5',
				]
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);
		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08cdacZ1',
			[
				'label' => __( 'Content', 'opticeye-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_all_testi_bgcolor',
			[
				'label' => __( 'Background Color', 'opticeye-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'all_testi_bgcolor',
			[
				'label' => __( ' Background Color', 'opticeye-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial' => 'background-color: {{VALUE}};',
				],
			]
		);


		$this->add_control(
			'head_name',
			[
				'label' => __( 'Client Name', 'opticeye-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'member_name_typography',
				'label' => __( 'Typography', 'opticeye-core' ),
				'selector' => '{{WRAPPER}} .pt-testimonial .pt-testmonial-title ',
			]
		);

		$this->add_control(
			'member_name_color',
			[
				'label' => __( 'Color', 'opticeye-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial  .pt-testmonial-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'head_designation',
			[
				'label' => __( 'Designation', 'opticeye-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Designation_typography',
				'label' => __( 'Typography', 'opticeye-core' ),
				'selector' => '{{WRAPPER}} .pt-testimonial .pt-testimonial-meta span',
			]
		);

		$this->add_control(
			'Designation_colors',
			[
				'label' => __( 'Color', 'opticeye-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial .pt-testimonial-meta span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'head_desc',
			[
				'label' => __( 'Description', 'opticeye-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'descrition_typography',
				'label' => __( 'Typography', 'opticeye-core' ),
				'selector' => '{{WRAPPER}} .pt-testimonial .pt-testimonial-description',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'opticeye-core' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial .pt-testimonial-description' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		
		$this->start_controls_section(
			'section__kkererfre1xx',
			[
				'label' => __( 'Slider Style', 'opticeye-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'testimonial_inner_style' => 'slider',
					'testimonial_style!' => '5',
				]
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08sadaZ1',
			[
				'label' => __( 'Icon', 'opticeye-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_icon',
			[
				'label' => __( 'Icon', 'opticeye-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'icon_size_5128328987',
			[
				'label' => __( 'size', 'opticeye-core' ),
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
					'{{WRAPPER}} .pt-testimonial .pt-testimonial-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'opticeye-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-testimonial .pt-testimonial-icon i' => 'color: {{VALUE}};',
				],


			]
		);


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
			if($settings['testimonial_inner_style'] == 'slider')
			{
				require plugin_dir_path( __FILE__ ) . 'style-4-slider.php';
			}
			elseif($settings['testimonial_inner_style'] == 'grid')
			{
				require plugin_dir_path( __FILE__ ) . 'style-4-grid.php';
			}
		}
		elseif($settings['testimonial_style'] == '5')
		{
			require plugin_dir_path( __FILE__ ) . 'style-5.php';
		}
		elseif($settings['testimonial_style'] == '6')
		{
			require plugin_dir_path( __FILE__ ) . 'style-6.php';
		}

		if ( Plugin::$instance->editor->is_edit_mode() ) :
			$slider = new Slider_Controls();
			$slider->load_owl_js($this);
			 ?>
			<script> 
				if ( jQuery('.slick-slider-main').length ) {

                var $slider = jQuery('.slick-slider-main')
                .slick({
                  slidesToShow: 1,
                  arrows: true,
                  autoplay: true,
                  dots: true,
                  lazyLoad: 'ondemand',
                  autoplaySpeed: 3000,
                  asNavFor: '.slick-slider-thumb'
                });

                var $slider2 = jQuery('.slick-slider-thumb')

                .slick({
                  slidesToShow: 3,
                  lazyLoad: 'ondemand',
                  asNavFor: '.slick-slider-main',
                  dots: false,
                  arrows: false,
                  centerMode: false,
                  focusOnSelect: true
                });

              }
			</script>
	<?php
		endif;

	}



}

Plugin::instance()->widgets_manager->register( new \Elementor\optic_testi() );