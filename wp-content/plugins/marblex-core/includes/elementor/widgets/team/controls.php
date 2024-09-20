<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;
 

class Teams extends Widget_Base {

	public function get_name() {
		return __( 'team', 'marblex-core' );
	}

	public function get_title() {
		return __( 'Team', 'marblex-core' );
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

	protected function register_controls() {

		$this->start_controls_section(
			'section235644',
			[
				'label' => __( 'Style', 'marblex-core' ),
			]
		);


		$this->add_control(
			'team_style',
			[
				'label'      => __( 'Style', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => '1',
				'options'    => [
					'1'          => __( 'Style-1 Team slider', 'marblex-core' ),
					'2'          => __( 'Style-1 Team grid', 'marblex-core' ),
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'sectionpo',
			[
				'label' => __( 'Team Slider Style', 'marblex-core' ),
				'condition' => [ 
					'team_style' => ['1'],
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'team_head_icon',
			[
				'label' => __( 'Head Icon', 'marblex-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				
			]
		);

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
			'title_text',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is title', 'marblex-core' ),
				'placeholder' => __( 'Enter  title', 'marblex-core' ),
				'label_block' => true,

			]
		);

		$repeater->add_control(
			'website_link_team',
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
		$repeater->add_control(
			'sub_title_text',
			[
				'label' => __( 'Designation', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Designation', 'marblex-core' ),
				'label_block' => true,

			]
		);

		$repeater->add_control(
			'icon_list1',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-instagram',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $repeater->add_control(
			'icon_url1',
			[
				'label'       => __( 'Url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],			
			]
		);  		
		$repeater->add_control(
			'icon_list2',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-twitter',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);        
		$repeater->add_control(
			'icon_url2',
			[
				'label'       => __( 'Url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],			
			]
		);  		
		$repeater->add_control(
			'icon_list3',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-linkedin',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $repeater->add_control(
			'icon_url3',
			[
				'label'       => __( 'url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],			
			]
		); 		
		$repeater->add_control(
			'icon_list4',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-google-plus',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $repeater->add_control(
			'icon_url4',
			[
				'label'       => __( 'url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
			]
		);        
		$repeater->add_control(
			'icon_list5',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-flickr',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $repeater->add_control(
			'icon_url5',
			[
				'label'       => __( 'url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
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
						'title_text' => __( 'Title', 'marblex-core' ),
					]
				]

			]

		);



		$this->end_controls_section();

		$this->start_controls_section(
			'sectionpofefo',
			[
				'label' => __( 'Team Grid Style', 'marblex-core' ),
				'condition' => [ 
					'team_style' => ['2']
				]
			]
		);
		
		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'marblex-core'),
				'type' => Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],

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
				'placeholder' => __( 'Enter  title', 'marblex-core' ),
				'label_block' => true,

			]
		);

		$this->add_control(
			'sub_title_text',
			[
				'label' => __( 'Designation', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Designation', 'marblex-core' ),
				'label_block' => true,

			]
		);

		$this->add_control(
			'icon_list1',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-instagram',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $this->add_control(
			'icon_url1',
			[
				'label'       => __( 'Url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],			
			]
		);  		
		$this->add_control(
			'icon_list2',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-twitter',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);        
		$this->add_control(
			'icon_url2',
			[
				'label'       => __( 'Url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],			
			]
		);  		
		$this->add_control(
			'icon_list3',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-linkedin',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $this->add_control(
			'icon_url3',
			[
				'label'       => __( 'url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'default' => [
					'url' => '#',
					'is_external' => false,
					'nofollow' => false,
					'custom_attributes' => '',
				],			
			]
		); 		
		$this->add_control(
			'icon_list4',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-google-plus',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $this->add_control(
			'icon_url4',
			[
				'label'       => __( 'url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
			]
		);        
		$this->add_control(
			'icon_list5',
			[
				'label'      => __( 'Social Icon', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'soc-flickr',
				'options'    => [
					'soc-facebook'          => __( 'Facebook', 'marblex-core' ),
					'soc-instagram'          => __( 'Instagram', 'marblex-core' ),
					'soc-twitter'          => __( 'Twitter', 'marblex-core' ),
					'soc-linkedin'          => __( 'Linkedin', 'marblex-core' ),
					'soc-google-plus'          => __( 'Google', 'marblex-core' ),
					'soc-flickr'          => __( 'Flickr', 'marblex-core' ),
					'soc-pinterest'          => __( 'Pinterest', 'marblex-core' ),
					'soc-telegram'          => __( 'Telegram', 'marblex-core' ),
					'soc-whatsapp'          => __( 'Whatsapp', 'marblex-core' ),

				],
				'separator' => 'before',
			]
		);

        $this->add_control(
			'icon_url5',
			[
				'label'       => __( 'url', 'marblex-core' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
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
				'default'    => 'left',
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
				'selectors' => [
					'{{WRAPPER}} .pt-team-box' => 'text-align: {{VALUE}};',
				]
			]
		);
		$this->end_controls_section();


		$this->start_controls_section(
			'section_control',
			[
				'label' => __( 'Slider Control', 'marblex-core' ),
				'condition' => [
					'team_style' => ['1'],
				],
			]
		);
		$slider = new Slider_Controls();
		$slider->slider_control($this);


		$this->end_controls_section();

		 // Style tab start
		$this->start_controls_section(
			'section__2p08cZ1',
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
				'selector' => '{{WRAPPER}} .pt-team-box .pt-member-name ',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-team-box .pt-member-name ' => 'color: {{VALUE}};',

				],


			]
		);
	

		$this->add_control(
			'head_subtitle',
			[
				'label' => __( 'Designation', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-team-box .pt-team-designation',

			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-team-box  .pt-team-designation' => 'color: {{VALUE}};',
				],


			]
		);

		$this->add_control(
			'head_bgtittle',
			[
				'label' => __( 'Background', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'title_color_bgcolor',
			[
				'label' => __( 'Background Color', 'marblex-core' ),
				
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-team-box .pt-team-info' => 'background: {{VALUE}};',
				],
	
			]
		);

		
		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08Z1',
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

		$this->add_control(
			'icon_size_5128328987',
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
					'{{WRAPPER}} .pt-team-box .pt-team-social  a i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-team-box .pt-team-social  a i' => 'color: {{VALUE}};',
				],


			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p0vxfff0Z1xx',
			[
				'label' => __( 'Slider Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'team_style' => ['1'],
				],
			]
		);  

		$slider = new Slider_Controls();
		$slider->slider_style($this);

		$this->end_controls_section();
		 // style tab end


	}

	protected function render() {
		$settings = $this->get_settings();

		if($settings['team_style'] == '1')
		{
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
		}
		elseif($settings['team_style'] == '2')
		{
			require plugin_dir_path( __FILE__ ) . 'style-2.php';			
		}
		if ( Plugin::$instance->editor->is_edit_mode() ) :
			$slider = new Slider_Controls();
			$slider->load_owl_js($this);
		endif;
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Teams() );