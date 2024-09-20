<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;
 

class Blog extends Widget_Base {
	public function get_name() {
		return __( 'blog', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Blog', 'marblex-core' );
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
		return 'eicon-post';
	}


	protected function register_controls() {
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'Blog', 'marblex-core' ),
			]
		);


		$this->add_control(
			'blog_style',
			[
				'label'      => __( 'Choose Image/Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '0',
				'options'    => [
					'0'       => __( 'slider', 'marblex-core' ),
					'1'          => __( '1 Column', 'marblex-core' ),
					'2'          => __( '2 Column', 'marblex-core' ),
					'3'          => __( '3 Column', 'marblex-core' ),
				],
			]
		);
        $this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'marblex-core' ),
                'type' => Controls_Manager::CHOOSE,
                'separator' => 'after',
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
					'end' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					]
				]
			]
		);


         $this->add_control(
			'des_button',
			[
				'label' => __( 'Description show', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'yes' => __( 'yes', 'marblex-core' ),
				'no' => __( 'no', 'marblex-core' ),
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



  		$this->add_control('crop_images',
            array(
                'label'        => esc_html__('Crop Images','marblex-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'separator' => 'before',
                'true'     => esc_html__( 'yes', 'marblex-core' ),
                'false'    => esc_html__( 'no', 'marblex-core' ),
                'return_value' => 'true',
                'condition'=>[
                	'blog_style' => '0',
                ],
            )
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				'condition' => [
					'blog_style' => ['0'],
				],
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);

		$this->end_controls_section();

       	$this->start_controls_section(
			'section__2p08cZ1',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'head_a_c',
			[
				'label' => __( 'Author', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'a_typography',
				'label' => __( 'Author Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-blog-post .pt-post-author',

			]
		);


		$this->add_control(

			'admin_color',
			[
				'label' => __( 'Author Colors', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog-post .pt-post-author' => 'color: {{VALUE}};',


		 		],


			]
		);

		$this->add_control(
			'hread_comments',
			[
				'label' => __( 'Comments', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'c_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-blog-post .pt-post-comment a',

			]
		);

		$this->add_control(

			'cat_color',
			[
				'label' => __( 'Colors', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog-post .pt-post-comment a' => 'color: {{VALUE}};',


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
				'selector' => '{{WRAPPER}} .pt-blog-post .pt-blog-title a'

			]
		);

		 $this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog-post .pt-blog-title a' => 'color: {{VALUE}};',
		 		],


			]
		);

            $this->add_control(
			'htitle_color',
			[
				'label' => __( 'Hover Title Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog-post .pt-blog-title a:hover' => 'color: {{VALUE}};',
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
				'selector' => '{{WRAPPER}} .pt-blog-post .pt-blog-contain .pt-blog-info',
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog-post .pt-blog-contain .pt-blog-info' => 'color: {{VALUE}};',
		 		],


			]
		);
		$this->add_control(
			'head_bgcolor_beqadehi',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_control(
			'all_blog_bgcolordhdh',
			[
				'label' => __( ' Background Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog .pt-blog-contain' => 'background-color: {{VALUE}};',
		 		],
			]
		);

		$this->end_controls_section();

         $this->start_controls_section(
			'section__2p08c8',
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

         $this->add_responsive_control(
			'font_size_5128329087',
			[
				'label' => __( 'Author/Comments Typography', 'marblex-core' ),
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
					'{{WRAPPER}} .pt-blog-post .pt-post-meta ul li i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(

			'admincaticon_color',
			[
				'label' => __( 'Author/Comments Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-blog-post .pt-post-meta ul li i' => 'color: {{VALUE}};',


		 		],


			]
		);

		 $this->end_controls_section();


         //START BUTTON

		$this->start_controls_section(
			'section_hikhdia',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
			$btn = new Button_Controls();
			$btn->get_btn_style($this);



		$this->start_controls_section(
			'section__2p0vxf0Z1xx',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'blog_style' => ['0'],
				],
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();

		 // Button End

     }

	protected function render() {
		$settings = $this->get_settings();
		if($settings['blog_style'] == '0')
		{
       	require plugin_dir_path( __FILE__ ) . 'style-1-slider.php';
       }
       if($settings['blog_style'] == '1' || $settings['blog_style'] == '2' ||
		  $settings['blog_style'] == '3')
		{
			 require plugin_dir_path( __FILE__ ) . 'style-1-grid.php';

		}       

        if ( Plugin::$instance->editor->is_edit_mode() ) :
		$slider = new Slider_Controls();
		$slider->load_owl_js();
		endif;
    }

}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Blog() );