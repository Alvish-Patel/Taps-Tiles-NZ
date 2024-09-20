<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Timeline extends Widget_Base {
	public function get_name() {
		return __( 'Timeline', 'marblex-core' );
	}
	public function get_title() {
		return __( 'Timeline', 'marblex-core' );
	}
	public function get_categories() {
		return [ SCEW::get_category() ];
	}
	public function get_icon() {
		return '';
	}
	protected function register_controls() {
		 $this->start_controls_section(
			'sectionasaspo',
			[
				'label' => __( 'Single Style', 'marblex-core' ),
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'marblex-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'title_number',
			[
				'label' => __( 'number', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
        );
        $repeater->add_control(
			'title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
			]
        );
        $repeater->add_control(
			'description_text',
			[
				'label' => __( 'Description', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
				'label_block' => true,
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
						'title_text' => __( 'Title', 'marblex-core' ),
					]
				]
			]
		);
        $this->end_controls_section();


        // Style
		 $this->start_controls_section(
			'section__2p08c678',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		 $this->add_control(
			'head_boxes',
			[
				'label' => __( 'Content box', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				
			]
		);

		$this->add_control(
			'boxes_color',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-timelines .cntl-content' => 'background: {{VALUE}};',
		 		],
				
				
			]
		);

		$this->add_control(
			'bodersss_color',
			[
				'label' => __( 'Border line Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cntl-content' => 'border-bottom: {{VALUE}};',
		 		],
				
				
			]
		);

		 $this->add_control(
			'head_tittle',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tittle_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-timelines .cntl-content h4',
			]
		);
		 
		$this->add_control(
			'tittle_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-timelines .cntl-content h4' => 'color: {{VALUE}};',

					
		 		],
				
				
			]
		);


		$this->add_control(
			'head_nums',
			[
				'label' => __( 'Number', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				
			]
		);

		$this->add_control(
			'nums_borderss',
			[
				'label' => __( 'Border-line Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-timelines .cntl-icon' => 'border-color: {{VALUE}};',
		 		],
				
				
			]
		);

		$this->add_control(
			'nums_circle',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-timelines .cntl-icon' => 'background: {{VALUE}};',
		 		],
				
				
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'numberr_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-timelines .cntl-icon',
			]
		);

		$this->add_control(
			'numberr_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-timelines .cntl-icon' => 'color: {{VALUE}};',
		 		],
				
				
			]
		);

		$this->add_control(
			'head_dessc',
			[
				'label' => __( 'Desscription', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		 $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desscription_typography',
				'label' => __( 'Typography', 'marblex-core' ),				
				'selector' => '{{WRAPPER}} .pt-timelines .cntl-content p',
			]
		);

		$this->add_control(
			'dessc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-timelines .cntl-content p' => 'color: {{VALUE}};',
					
		 		],
				
				
			]
		);
			
		 $this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings();
		require plugin_dir_path( __FILE__ ) . 'style-1.php';
		if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
			<script>
			if (jQuery('.cntl ').length > 0) {
				asyncloader.require(['jquery.cntl'], function() {
					Timeline = function(){
						jQuery(' .cntl').each(function() {
							jQuery(this).cntl({
								revealbefore: 300,
								anim_class: 'cntl-animate',
								onreveal: function(e){
									console.log(e);
								}
							});
						});
					};
					Timeline();
				});
			}
		</script>
		<?php
	endif;
}
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Timeline() );