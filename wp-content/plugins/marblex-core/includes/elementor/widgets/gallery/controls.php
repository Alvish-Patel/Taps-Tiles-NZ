<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class pt_gallery extends Widget_Base {

	public function get_name() {
		return __( 'pt_gallery', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'marblex Gallery', 'marblex-core' );
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
		return 'eicon-gallery-grid';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'Gallery', 'marblex-core' ),
			]
		);

		$this->add_control(
			'portfolio_style',
			[
				'label' => __( 'Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style-1', 'marblex-core' ),
				],
			]
		);

		$this->add_control(
			'portfolio_hover_style',
			[
				'label' => __( 'Hover Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'pt-hover-bellow',
				'options' => [
					'pt-hover-bellow'  => __( 'Bellow', 'marblex-core' ),
					'pt-hover-follow'  => __( 'Follow', 'marblex-core' ),
					'pt-hover-fade'    => __( 'Fade', 'marblex-core' ),
					'pt-hover-slide'   => __( 'Slide', 'marblex-core' ),
				],
			]
		);
		$repeater = new Repeater();


		$repeater->add_control(
			'gallery_image',
			[
				'label' => __( 'Image', 'marblex-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'separator'=> 'after',


			]
		);	
		$repeater->add_control(
			'gallery_title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sample title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
				'label_block' => true,
				'separator'=> 'before',
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

		$this->add_control(
			'tabs',
			[
				'label' => __( 'Tabs Items', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title_text' => __( 'Service Box', 'marblex-core' ),
					]
				]
			]
		);		

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'after',
                'default' => __( 'text-left', 'marblex-core' ),
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
					]
				],
			]
		);
		
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section__2p080Z1',
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
				'selector' => '{{WRAPPER}} .pt-portfolio-info .pt-gallery-title',
			]
		);

            $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio-info .pt-gallery-title' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);  

         $this->end_controls_section(); 
      
	}
	
	protected function render() {
		$settings = $this->get_settings();
		if($settings['portfolio_style'] == '1')
		{
		require plugin_dir_path( __FILE__ ) . 'style-1.php';

		}
 
        if ( Plugin::$instance->editor->is_edit_mode() ) : 
		$slider = new Slider_Controls();
		$slider->load_owl_js();
		endif; 
    }	    
		
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\pt_gallery() );