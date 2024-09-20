<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Client extends Widget_Base {

	public function get_name() {
		return __( 'client', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Client', 'marblex-core' );
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
		return 'eicon-lock-user';
	}

	protected function register_controls(){

		$this->start_controls_section(
			'section248452',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);

		$this->add_control(
			'client_style',
			[
				'label' => __( 'Client Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
				],
			]
		);

      $this->add_control(
			'inner_style',
			[
				'label' => __( 'Client Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'slider',
				'options' => [
					'slider'  => __( 'Slider', 'marblex-core' ),
					'grid'  => __( 'Grid', 'marblex-core' ),
				],
			]
		);

    $this->end_controls_section();

   

		$this->start_controls_section(
			'section_asdfsd',
			[
				'label' => __( 'Client', 'marblex-core' ),
				'condition' => [
					'inner_style' => ['slider'],
				]
			]
		);

		$this->add_control(
			'custom_dimension',
			[
				'label' => __( 'Image Dimension', 'marblex-core' ),
				'type' => Controls_Manager::IMAGE_DIMENSIONS,
				'separator' => 'before',
				'description' => __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'marblex-core' ),
				'default' => [
					'width' => '',
					'height' => '',
				],

			]
		);

		$repeater = new Repeater();

		 $repeater->add_control(
			'image',
			[
				'label' => __( 'Image1', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);

		 $repeater->add_control(
			'image1',
			[
				'label' => __( 'Image2', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

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
				'separator' => 'before',

			]
		);




		 $this->add_control(
			'list_items',
			[
				'label' => __( 'List', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
						'image' => Utils::get_placeholder_image_src(),
					],
			]
		);

     $this->end_controls_section();


     $this->start_controls_section(
			'section_asdseffsd',
			[
				'label' => __( 'Client', 'marblex-core' ),
				'condition' => [
					'inner_style' => ['grid'],
				]			
			]
		);

		$this->add_control(
			'grid_custom_dimension',
			[
				'label' => __( 'Image Dimension', 'marblex-core' ),
				'type' => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => __( 'Crop the original image size to any custom size. Set custom width or height to keep the original size ratio.', 'marblex-core' ),
				'default' => [
					'width' => '',
					'height' => '',
				],

			]
		);


		 $this->add_control(
			'grid_image',
			[
				'label' => __( 'Image1', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);

		 $this->add_control(
			'grid_image1',
			[
				'label' => __( 'Image2', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,
				'separator' => 'before',
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],

			]
		);


		$this->add_control(
			'grid_btn_link',
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


     $this->end_controls_section();
    

     $this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				'condition' => [
					'inner_style' => ['slider'],
				]							
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);


		$this->end_controls_section();

		$this->start_controls_section(
			'section__2pc2s3dsefdee',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' =>[
					'inner_style' => 'slider',
				],
				
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();


    }

	protected function render() {

        $settings = $this->get_settings();

        if($settings['client_style'] == '1')
		{
			 if($settings['inner_style'] == 'slider')
			{
			require plugin_dir_path( __FILE__ ) . 'style-1-slider.php';
			} 
			if($settings['inner_style'] == 'grid')
			{
			require plugin_dir_path( __FILE__ ) . 'style-1-grid.php';
			}  
		}        

		 if ( Plugin::$instance->editor->is_edit_mode() ) :
		$slider = new Slider_Controls();
		$slider->load_owl_js($this);
		endif;


    }

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Client() );
