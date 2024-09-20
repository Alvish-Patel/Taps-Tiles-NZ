<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_grid extends Widget_Base {

	public function get_name() {
		return __( 'portfolio-grid', 'xxxx-core' );
	}

	public function get_title() {
		return __( 'portfolio Grid', 'xxxx-core' );
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
		return 'eicon-posts-grid';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_jkhdfhkdfk',
			[
				'label' => __( 'Style', 'xxxx-core' ),
			]
		);
		$this->add_control(
			'portfolio_style',
			[
				'label' => __( 'Style', 'xxxx-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
					'1'  => __( 'Style 1', 'xxxx-core' ),
					'2'  => __( 'Style 2', 'xxxx-core' ),
					'3'  => __( 'Style 3', 'xxxx-core' ),

				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section_slider',
			[
				'label' => __( 'portfolios', 'xxxx-core' ),
				'condition' => [
					'portfolio_style' => ['1','3'],
				]
			]
		);
		$this->add_control(
			'show_filter',
			[
				'label' => __( 'Show Filter-bar', 'xxxx-core' ),
				'type' => Controls_Manager::SWITCHER,
				'block' => __( 'Show', 'your-plugin' ),
				'none' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'none',
				'selectors' => [
					'{{WRAPPER}} .pt-filters .filters' => 'display: {{VALUE}};',

				],

			]
		);
		$this->add_control(
			'no_padding',
			[
				'label' => __( 'No padding', 'xxxx-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'xxxx-core' ),
				'label_off' => __( 'Hide', 'xxxx-core' ),
				'return_value' => 'no-padding',

			]
		);
		$this->add_control('crop_images',
			array(
				'label'        => esc_html__('Crop Images','xxxx-core' ),
				'type'         => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'label_on'     => esc_html__( 'On', 'xxxx-core' ),
				'label_off'    => esc_html__( 'Off', 'xxxx-core' ),
				'return_value' => false,

			)
		);
		$this->add_control(
			'crop_height',
			[
				'label' => __( 'height', 'xxxx-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Image height', 'xxxx-core' ),
				'label_block' => true,
				'condition' => [
					'crop_images' => 'false',
				],
			]
		);
		$this->add_control(
			'crop_weight',
			[
				'label' => __( 'weight', 'xxxx-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Image weight', 'xxxx-core' ),
				'label_block' => true,
				'condition' => [
					'crop_images' => 'false',
				],

			]
		);

		$this->add_control(
			'hide_load_more',
			[
				'label' => __( 'Hide Load More', 'xxxx-core' ),
				'type' => Controls_Manager::SWITCHER,
				'separator' => 'before',
				'none' => __( 'yes', 'your-plugin' ),
				'block' => __( 'no', 'your-plugin' ),
				'return_value' => 'none',
				'selectors' => [
					'{{WRAPPER}} .pt-button-container' => 'display: {{VALUE}};',

				],

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
		$this->add_control(
			'grid_style',
			[
				'label' => __( 'Grid Style', 'xxxx-core' ),
				'type' => Controls_Manager::SELECT,
				'separator' => 'before',
				'default' => 'pt-col-3',
				'options' => [
					'pt-col-6'  => __( 'Two Column', 'xxxx-core' ),
					'pt-col-4'  => __( 'Three Column', 'xxxx-core' ),
					'pt-col-3'  => __( 'Four Column', 'xxxx-core' ),
				],
			]
		);
		$this->add_control(
			'initial_items',
			[
				'label' => __( 'Number Item To Show', 'xxxx-core' ),
				'type' => Controls_Manager::NUMBER,
				'separator' => 'before',
				'min' => 1,
				'step' => 1,
				'default' => 5,
			]
		);

		$this->add_control(
			'next_items',
			[
				'label' => __( 'Number Of Item To Load', 'xxxx-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 5,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => __( 'Alignment', 'xxxx-core' ),
				'type' => Controls_Manager::CHOOSE,
				'separator' => 'after',
				'default' => __( 'left', 'xxxx-core' ),
				'options' => [
					'left' => [
						'title' => __( 'Left', 'xxxx-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'xxxx-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'xxxx-core' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .pt-portfolio' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_portfoliyo',
			[
				'label' => __( 'portfolio', 'marblex-core' ),
				'condition' => [
					'portfolio_style' => ['2'],
				],
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
			'title_text',
			[
				'label' => __( 'Title Text', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'This is sample title', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
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
			'btn_link',
			[
				'label' => __( ' Title Link', 'marblex-core' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'https://your-link.com', 'marblex-core' ),
				'separator' => 'before',
			]
		);	

		$repeater->add_control(
			'number_text',
			[
				'label' => __( 'Number Text', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( '01', 'marblex-core' ),
				'placeholder' => __( 'Enter your number', 'marblex-core' ),
				'label_block' => true,
			]
		);
		

		$repeater->add_control(
			'portfolio_location',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'type' => Controls_Manager::WYSIWYG,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Enter your portfolio-location here', 'marblex-core' ),
				'placeholder' => __( 'Enter your portfolio-location', 'marblex-core' ),
				'separator' => 'before',
				'rows' => 10,
				'show_label' => true,
			]
		);
		

		$this->add_control(
			'list_items',
			[
				'label' => __( 'List', 'marblex-core' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_text' => __( 'List #1', 'marblex-core' ),
					]
				]
			]
		);

		$this->end_controls_section();

         //START BUTTON

		$this->start_controls_section(
			'section_Jnza43wt8d8976H5b77duo',
			[
				'label' => __( 'Loadmore Button', 'xxxx-core' ),
				'condition' => [
					'portfolio_style' => '1'
				]
			]
		);

		$this->add_control(
			'loadmore_text',
			[
				'label' => __( 'Button Text', 'xxxx-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click Here', 'xxxx-core' ),
				'placeholder' => __( 'Enter your title', 'xxxx-core' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'loadmore_icon',
			[
				'label' => __( 'Choose Icon', 'xxxx-core'),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before',
				'default' => [
					'value' => 'ti-plus',
					'library' => 'solid',

				],	
			]
		);

		$this->add_responsive_control(
			'button_text_align',
			[
				'label' => __( 'Alignment', 'xxxx-core' ),
				'type' => Controls_Manager::CHOOSE,
				'default'    => 'left',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'xxxx-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'xxxx-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'xxxx-core' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .pt-btn-container' => 'text-align: {{VALUE}};',
				]
			]
		);

		$this->end_controls_section();


		// Button Style Section
			$this->start_controls_section(
			'section_hikhdafdeia',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => '1'
				]
				
			]
		);
			$btn = new Button_Controls();
			$btn->get_btn_style($this);

		// Style tab start
		$this->start_controls_section(
			'section__2p08cZ1',
			[
				'label' => __( 'Content', 'xxxx-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => '1'
				]
				
			]
		);

		$this->add_control(
			'head_title',
			[
				'label' => __( 'Title', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-grid   .pt-portfolio-info span',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-grid  .pt-portfolio-info span' => 'color: {{VALUE}};',

				],


			]
		);

		$this->add_control(
			'head_subtitle',
			[
				'label' => __( 'Designation', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-grid   .pt-portfolio-info h5',

			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-grid  .pt-portfolio-info h5' => 'color: {{VALUE}};',
				],


			]
		);



		$this->add_control(
			'head_filter_title',
			[
				'label' => __( 'Filter Title', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filtertitle_typography',
				'label' => __( 'Typography', 'xxxx-core' ),
				'selector' => '{{WRAPPER}} .pt-filters .pt-filter-button-group ul li',

			]
		);

		$this->add_control(
			'filter_title_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-filters .pt-filter-button-group ul li' => 'color: {{VALUE}};',
					'{{WRAPPER}} .pt-filters .pt-filter-button-group ul li.active, .pt-filters .pt-filter-button-group ul li.active:hover' => 'color: {{VALUE}};',
				],


			]
		);

		$this->add_control(
			'fil_active_title_color',
			[
				'label' => __( 'Active Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-filters .pt-filter-button-group ul li.active, .pt-filters .pt-filter-button-group ul li.active:hover' => 'color: {{VALUE}};',
				],


			]
		);

		$this->add_control(
			'bg_filter_color',
			[
				'label' => __( 'Background ', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-filters .pt-filter-button-group ul li.active, .pt-filters .pt-filter-button-group ul li.active:hover' => 'background: {{VALUE}};',
				],


			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08Z1',
			[
				'label' => __( 'Icon', 'xxxx-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => '1'
				]
			]
		);

		$this->add_control(
			'head_icon',
			[
				'label' => __( 'Icon', 'xxxx-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'icon_size_5128328987',
			[
				'label' => __( 'Typography', 'xxxx-core' ),
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
					'{{WRAPPER}} .pt-grid .pt-portfolio-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'icon_color',
			[
				'label' => __( 'Color', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-grid .pt-portfolio-icon i' => 'color: {{VALUE}};',
				],


			]
		);
		$this->add_control(
			'icon_bacground_color',
			[
				'label' => __( 'Background', 'xxxx-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-grid .pt-portfolio-icon i' => 'background: {{VALUE}};',
					'{{WRAPPER}} .pt-grid .pt-portfolio-icon img' => 'background: {{VALUE}};',
				],


			]
		);



		$this->end_controls_section();

		$this->start_controls_section(
			'section__2p08cZ1wsdw',
			[
				'label' => __( 'Content', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'portfolio_style' => '2'
				]
			]
		);

		$this->add_control(
			'second_title',
			[
				'label' => __( 'Title', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'Second_title_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-portfoliobox-2 .portfolio-title',
			]
		);

		$this->add_control(
			'second_title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox-2 .portfolio-title' => 'color: {{VALUE}};',

				],


			]
		);

		$this->add_control(
			'head_number',
			[
				'label' => __( 'Number', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-portfoliobox-2  .portfolio-number',
				
			]
		);

		$this->add_control(
			'number_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox-2  .portfolio-number' => 'color: {{VALUE}};',

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
				'name' => 'desc_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-portfoliobox-2  .portfolio-location',
				
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox-2  .portfolio-location' => 'color: {{VALUE}};',


				],
				
			]
		);



		$this->end_controls_section();

		 // style tab end

	}

	protected function render() {
		$settings = $this->get_settings();
		if($settings['portfolio_style'] == '1')
		{
			require plugin_dir_path( __FILE__ ) . 'style-1.php';
		}
		else if($settings['portfolio_style'] == '2')
		{
			require plugin_dir_path( __FILE__ ) . 'style-2.php';
		}
		else if($settings['portfolio_style'] == '3')
		{
			require plugin_dir_path( __FILE__ ) . 'style-3.php';
		}

		if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
			<script>

				jQuery('.pt-masonry').isotope({
					itemSelector: '.pt-masonry-item',
					masonry: {
						columnWidth: '.grid-sizer',
						gutter: 0
					}
				});

				jQuery('.pt-grid').isotope({
					itemSelector: '.pt-grid-item',
				});

				jQuery('.pt-filter-button-group').on( 'click', '.pt-filter-btn', function() {

					var filterValue = jQuery(this).attr('data-filter');
					jQuery('.pt-masonry').isotope({ filter: filterValue });
					jQuery('.pt-grid').isotope({ filter: filterValue });
					jQuery('.pt-filter-button-group .pt-filter-btn').removeClass('active');
					jQuery(this).addClass('active');

					updateFilterCounts();

				});

				var initial_items = 5;
				var next_items = 3;

				if(jQuery('.pt-masonry').length > 0)
				{
					var initial_items = jQuery('.pt-masonry').data('initial_items');
					var next_items = jQuery('.pt-masonry').data('next_items');
				}

				if(jQuery('.pt-grid').length > 0)
				{
					var initial_items = jQuery('.pt-grid').data('initial_items');
					var next_items = jQuery('.pt-grid').data('next_items');
				}

				function showNextItems(pagination) {
					var itemsMax = jQuery('.visible_item').length;
					var itemsCount = 0;
					jQuery('.visible_item').each(function () {
						if (itemsCount < pagination) {
							jQuery(this).removeClass('visible_item');
							itemsCount++;
						}
					});
					if (itemsCount >= itemsMax) {
						jQuery('#showMore').hide();
					}

					if(jQuery('.pt-masonry').length > 0)
					{
						jQuery('.pt-masonry').isotope('layout');
					}

					if(jQuery('.pt-grid').length > 0)
					{
						jQuery('.pt-grid').isotope('layout');
					}

				}
	// function that hides items when page is loaded
	function hideItems(pagination) {
		var itemsMax = jQuery('.pt-filter-items').length;
		console.log(itemsMax);
		var itemsCount = 0;
		jQuery('.pt-filter-items').each(function () {
			if (itemsCount >= pagination) {
				jQuery(this).addClass('visible_item');
			}
			itemsCount++;
		});
		if (itemsCount < itemsMax || initial_items >= itemsMax) {
			jQuery('#showMore').hide();
		}
		if(jQuery('.pt-masonry').length > 0)
		{
			jQuery('.pt-masonry').isotope('layout');
		}

		if(jQuery('.pt-grid').length > 0)
		{
			jQuery('.pt-grid').isotope('layout');
		}
	}
	jQuery('#showMore').on('click', function (e) {
		e.preventDefault();
		showNextItems(next_items);
	});
	hideItems(initial_items);

	function updateFilterCounts() {
		// get filtered item elements
		if(jQuery('.pt-masonry').length > 0)
		{
			var itemElems = jQuery('.pt-masonry').isotope('getFilteredItemElements');
		}
		if(jQuery('.pt-grid').length > 0)
		{
			var itemElems = jQuery('.pt-grid').isotope('getFilteredItemElements');
		}


		var count_items = jQuery(itemElems).length;
		console.log(count_items);

		if (count_items > initial_items) {
			jQuery('#showMore').show();
		} else {
			jQuery('#showMore').hide();
		}
		if (jQuery('.pt-filter-items').hasClass('visible_item')) {
			jQuery('.pt-filter-items').removeClass('visible_item');
		}
		var index = 0;

		jQuery(itemElems).each(function () {
			if (index >= initial_items) {
				jQuery(this).addClass('visible_item');
			}
			index++;
		});
		if(jQuery('.pt-masonry').length > 0)
		{
			jQuery('.pt-masonry').isotope('layout');
		}

		if(jQuery('.pt-grid').length > 0)
		{
			jQuery('.pt-grid').isotope('layout');
		}
	}

</script>

<?php endif;
}

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Portfolio_grid() );