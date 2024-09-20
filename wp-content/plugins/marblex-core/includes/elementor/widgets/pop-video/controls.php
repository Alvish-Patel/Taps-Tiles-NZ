<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;


class marblex_popup_video extends Widget_Base {
	public function get_name() {
		return __( 'Popup_video', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Popup video', 'marblex-core' );
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
		return 'eicon-video-camera';
	}
	protected function register_controls() {

		$this->start_controls_section(
			'section248457',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);

		$this->add_control(
			'pv_style',
			[
				'label' => __( 'Popup Video Style', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'marblex-core' ),
					'2'  => __( 'Style 2', 'marblex-core' ),


				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_video',
			[
				'label' => __( 'Popup_video', 'marblex-core' ),
			]
		);
		$this->add_control(
			'image_style',
			[
				'label'      => __( 'Choose Image/Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'separator' => 'before',
				'default'    => 'none',
				'options'    => [
					'none'       => __( 'None', 'marblex-core' ),
					'image'          => __( 'Image', 'marblex-core' ),
					'icon'          => __( 'Icon', 'marblex-core' ),

				],
			]
		);
		$this->add_control(
			'image_icon',
			[
				'label' => __( 'Choose Image', 'marblex-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],

				'condition' => [
					'image_style' => 'image',
				],
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => true,
				'default' => [
					'value' => 'ion ion-play',

				],
				'fa4compatibility' => 'icon',
				'condition' => [
					'image_style' => 'icon',
				]
			]
		);
		$this->add_control(
			'video_type',
			[
				'label' => __( 'Source', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'video_link',
				'options' => [
					'video_link' => __( 'Link', 'marblex-core' ),
					'hosted' => __( 'Self Hosted', 'marblex-core' ),
				],
			]
		);
		$this->add_control(
			'self_url',
			[
				'label' => __( 'Choose File', 'marblex-core' ),
				'type' => Controls_Manager::MEDIA,

				'media_type' => 'video',
				'condition' => [
					'video_type' => 'hosted',
				],
			]
		);
		$this->add_control(
			'link_url',
			[
				'label' => __( 'Link', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your URL', 'marblex-core' ),
				'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
				'label_block' => true,
				'condition' => [
					'video_type' => 'video_link',
				],
			]
		);
		$this->add_control(
			'colour_elements',
			[
				'label' => __( 'Show Elements', 'marblex-core' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'default',
				'multiple' => false,
				'options' => [
					'default'  => __( 'default', 'marblex-core' ),
					'primary' => __( 'primary', 'marblex-core' ),
				],
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

			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section__289656',
			[
				'label' => __( 'Icon', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'head_icon',
			[
				'label' => __( 'Icon', 'plugin-name' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'font_size_5789054287',
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
					'{{WRAPPER}} .pt-popup-video-block .pt-video-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-popup-video-block .pt-video-icon i' => 'color: {{VALUE}};',
				],


			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();
		if($settings['pv_style'] == '1' ||$settings['pv_style'] == '2' )
		{
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
		}

		if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
			<script>
				jQuery('.popup-youtube, .popup-vimeo, .popup-gmaps, .button-play').magnificPopup({
					type: 'iframe',
					mainClass: 'mfp-fade',
					preloader: true,
				});
			</script>

		<?php endif;
	}

}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\marblex_popup_video() );