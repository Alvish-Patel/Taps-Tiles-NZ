<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit; 

class Fitsense_Progressbar extends Widget_Base {

	public function get_name() {
		return __( 'marblex_progressbar', 'marblex-core' );
	}
	
	public function get_title() {
		return __( 'Marblex Progressbar', 'marblex-core' );
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
  return 'eicon-skill-bar';
}



protected function register_controls() {
  $this->start_controls_section(
   'section_rtqCSgd6aLy7Pc23Q5bI',
   [
    'label' => __( 'Progress Bar Style', 'marblex-core' ),
  ]
);

  $this->add_control(
   'design_style',
   [
    'label' => __( 'Progressbar Style', 'marblex-core' ),
    'type' => Controls_Manager::SELECT,
    'default' => '1',
    'options' => [
     '1'  => __( 'Style 1', 'marblex-core' ),
     

   ],
 ]
);


  $this->end_controls_section();
  $this->start_controls_section(
   'section',
   [
    'label' => __( 'Progressbar', 'marblex-core' ),
  ]
);       

  $repeater = new Repeater();
  $repeater->add_control(
   'section_title',
   [
    'label' => __( 'Title', 'marblex-core' ),
    'type' => Controls_Manager::TEXT,
    'dynamic' => [
     'active' => true,
   ],
   'label_block' => true,
   'default' => __( 'Add Your Title Text Here', 'marblex-core' ),
 ]
);	

  $repeater->add_control(
   'tab_score',
   [
    'label' => __( 'Score out of 100', 'marblex-core' ),
    'type' => Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
     'px' => [
      'min' => 0,
      'max' => 1000,
      'step' => 5,
    ],
    '%' => [
      'min' => 0,
      'max' => 100,
    ],
  ],
  'default' => [
   'unit' => '%',
   'size' => 50,
 ],

]
);
  $this->add_control(
   'progress_bar',
   [
    'label' => __( 'Add Progress Bar', 'marblex-core' ),
    'type' => Controls_Manager::REPEATER,
    'fields' => $repeater->get_controls(),
    'default' => [
     [
      'section_title' => __( 'List Items', 'marblex-core' ),
      'tab_score'=>__( '50', 'marblex-core' ),

    ]

  ],
  'title_field' => '{{{ section_title }}}',
  'figure_field' => '{{{ tab_score }}}',
]
);

  $this->add_control(
   'gymster_has_box_shadow',
   [
    'label' => __( 'Box Shaow?', 'marblex-core' ),
    'type' => Controls_Manager::SWITCHER,
    'default' => 'no',
    'yes' => __( 'yes', 'marblex-core' ),
    'no' => __( 'no', 'marblex-core' ),
  ]
);

  $this->end_controls_section();

  $this->start_controls_section(
   'section_progress_style',
   [
    'label' => __( 'Progress Bar Style', 'marblex-core' ),
    'tab' => Controls_Manager::TAB_STYLE,
  ]
);

  $this->add_control(
   'progress_back_color',
   [
    'label' => __( 'Progress Bar Background Color', 'marblex-core' ),
    'type' => Controls_Manager::COLOR,
    'selectors' => [					
     '{{WRAPPER}} .pt-progress-bar .bar' => 'background-color: {{VALUE}}!important;',

   ],
 ]
);

  $this->add_group_control(
   Group_Control_Typography::get_type(),
   [
    'name' => 'title_text_typography',
    'label' => __( 'Title Typography', 'marblex-core' ),				
    'selector' => '{{WRAPPER}} .pt-progressbar-box .progress-title',
  ]
);


  $this->add_control(
   'title_color',
   [
    'label' => __( 'Title Color', 'marblex-core' ),
    'type' => Controls_Manager::COLOR,
    'selectors' => [
     '{{WRAPPER}} .pt-progressbar-box .progress-title' => 'color: {{VALUE}};',

   ],
 ]
);

  $this->add_group_control(
   Group_Control_Typography::get_type(),
   [
    'name' => 'number_text_typography',
    'label' => __( 'Number Typography', 'marblex-core' ),				
    'selector' => '{{WRAPPER}} .pt-progressbar-box .progress-value',
  ]
);

  $this->add_control(
   'number_color',
   [
    'label' => __( 'Number Color', 'marblex-core' ),
    'type' => Controls_Manager::COLOR,
    'selectors' => [
     '{{WRAPPER}} .pt-progressbar-box .progress-value' => 'color: {{VALUE}};'


   ],
 ]
);

  $this->add_group_control(
   Group_Control_Background::get_type(),
   [
    'name' => 'flip_back_back',
    'types' => [ 'classic', 'gradient' ],			

    'selector' => '{{WRAPPER}} .pt-progressbar-box .show-progress ,{{WRAPPER}}  .pt-progressbar-style-3 .progress-value, {{WRAPPER}} .pt-progressbar-style-3 .progress-value::before',
    'fields_options' => [
     'background' => [
      'frontend_available' => true,
    ]

  ],
]
);



  $this->add_responsive_control(
   'progressbar_height',
   [
    'label' => __( 'Height', 'marblex-core' ),
    'type' => Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
     'px' => [
      'min' => 0,
      'max' => 100,
      'step' => 5,
    ],
    '%' => [
      'min' => 0,
      'max' => 100,
    ],
  ],
  'selectors' => [
   '{{WRAPPER}} .pt-progress-bar .bar' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
   '{{WRAPPER}} .pt-progress-bar .bar-container' => 'height: {{SIZE}}{{UNIT}}!important;',
 ],
]
);

  $this->add_responsive_control(
   'progressbar_border_radius',
   [
    'label' => __( 'Border Radius', 'marblex-core' ),
    'type' => Controls_Manager::SLIDER,
    'size_units' => [ 'px', '%' ],
    'range' => [
     'px' => [
      'min' => 0,
      'max' => 100,
      'step' => 5,
    ],
    '%' => [
      'min' => 0,
      'max' => 100,
    ],
  ],
  'selectors' => [
   '{{WRAPPER}} .pt-progress-bar .bar,{{WRAPPER}} .pt-progress-bar>span' => 'border-radius: {{SIZE}}{{UNIT}}!important;',
 ],
]
);




  $this->end_controls_section();




}

protected function render() {
  $settings = $this->get_settings();

  if($settings['design_style'] == '1')
  {
    require plugin_dir_path( __FILE__ ) . 'style-1.php';
  }
  if ( Plugin::$instance->editor->is_edit_mode() ) {

   ?>

   <script>	
						 /*------------------------
                Progress Bar
                --------------------------*/
              jQuery('.pt-progress-bar > span').each(function() {
                var app_slider = jQuery('.pt-progressbar-box');
                jQuery(this).progressBar({
                  shadow: false,
                  animation: true,
                  height: app_slider.data('h'),
                  percentage: false,
                  border: false,
                  animateTarget: true,
                });
              });
              </script>

              <?php 
            }
          }	    

        }

        Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Fitsense_Progressbar() );