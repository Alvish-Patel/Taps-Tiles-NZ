<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;

class Portfolio_Mansory extends Widget_Base {

	public function get_name() {
		return __( 'portfolio-mansory', 'marblex-core' );
	}

	public function get_title() {
		return __( 'portfolio Mansory', 'marblex-core' );
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
		return ' eicon-gallery-masonry';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_mansory',
			[
				'label' => __( 'portfolio', 'marblex-core' ),
			]
		);

		$this->add_control(
			'show_filter',
			[
				'label' => __( 'Show Filter-bar', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'block' => __( 'Show', 'marblex-core' ),
				'none' => __( 'Hide', 'marblex-core' ),
				'return_value' => 'none',

				'selectors' => [
						'{{WRAPPER}} .pt-filters .filters' => 'display: {{VALUE}};',

					],

			]
		);
		$this->add_control(
			'no_padding',
			[
				'label' => __( 'No Padding', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'no-padding' => __( 'yes', 'marblex-core' ),
				'padding' => __( 'no', 'marblex-core' ),
				'return_value' => 'no-padding',

			]
		);
		$this->add_control('crop_images',
            array(
                'label'        => esc_html__('Crop Images','marblex-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'true'     => esc_html__( 'yes', 'marblex-core' ),
                'false'    => esc_html__( 'no', 'marblex-core' ),
                'return_value' => 'true',


            )
        );
		$this->add_control(
			'crop_style',
				[
					'label' => __( 'Crop Style', 'marblex-core' ),
					'type' => Controls_Manager::SELECT,
					'default' => 'crop_style_1',
					'options' => [
						'crop_style_1'  => __( 'layout 1', 'marblex-core' ),
						'crop_style_2'  => __( 'layout 2', 'marblex-core' ),
					],
					   'condition' => [
					'crop_images' => 'true',
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
			'hide_load_more',
			[
				'label' => __( 'Hide Load More', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'none' => __( 'yes', 'marblex-core' ),
				'block' => __( 'no', 'marblex-core' ),
				'return_value' => 'none',
				'selectors' => [
						'{{WRAPPER}} .pt-btn-load-container' => 'display: {{VALUE}};',

					],

			]
		);

	$this->add_control(
			'initial_items',
			[
				'label' => __( 'Number Item To Show', 'marblex-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 5,
			]
		);

	$this->add_control(
			'next_items',
			[
				'label' => __( 'Number Of Item To Load', 'marblex-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 5,
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
					'right' => [
						'title' => __( 'Right', 'marblex-core' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'selectors' => [
					'{{WRAPPER}} .pt-portfoliobox-1 .pt-portfolio-info' => 'text-align: {{VALUE}}',
				],
			]
		);
		 $this->end_controls_section();

        //START BUTTON

		 $this->start_controls_section(
		 	'section_Jnza43wt8d8976H5b77duo',
		 	[
		 		'label' => __( 'Loadmore Button', 'marblex-core' ),
		 	]
		 );

		 $this->add_control(
			'loadmore_text',
			[
				'label' => __( 'Button Text', 'marblex-core' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => __( 'Click Here', 'marblex-core' ),
				'placeholder' => __( 'Enter your title', 'marblex-core' ),
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
					'{{WRAPPER}} .pt-btn-container' => 'text-align: {{VALUE}};',
				]
			]
        );

		$this->end_controls_section();


		// Button Style Section
			$this->start_controls_section(
			'section_hikhdadweesfdeia',
			[
				'label' => __( 'Button Style', 'marblex-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
				
			]
		);
			$btn = new Button_Controls();
			$btn->get_btn_style($this);
		
    // Button End
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
				'selector' => '{{WRAPPER}} .pt-masonry  .pt-portfolio-info span',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-masonry .pt-portfolio-info span' => 'color: {{VALUE}};',

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
				'selector' => '{{WRAPPER}} .pt-masonry  .pt-portfolio-info h5',

			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-masonry .pt-portfolio-info h5' => 'color: {{VALUE}};',
		 		],


			]
		);



		$this->add_control(
			'head_filter_title',
			[
				'label' => __( 'Filter Title', 'marblex-core' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filtertitle_typography',
				'label' => __( 'Typography', 'marblex-core' ),
				'selector' => '{{WRAPPER}} .pt-filters .pt-filter-button-group ul li',

			]
		);

		$this->add_control(
			'filter_title_color',
			[
				'label' => __( 'Color', 'marblex-core' ),

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
				'label' => __( 'Active Color', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-filters .pt-filter-button-group ul li.active, .pt-filters .pt-filter-button-group ul li.active:hover' => 'color: {{VALUE}};',
		 		],


			]
		);

    $this->add_control(
			'bg_filter_color',
			[
				'label' => __( 'Background ', 'marblex-core' ),

				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .pt-filters .pt-filter-button-group ul li.active, .pt-filters .pt-filter-button-group ul li.active:hover' => 'background: {{VALUE}};',
		 		],


			]
		);

		 $this->end_controls_section();


		 // style tab end
	}

	protected function render() {
		$settings = $this->get_settings();
       require plugin_dir_path( __FILE__ ) . 'style-1.php';


         if ( Plugin::$instance->editor->is_edit_mode() ) : 
         	?>
		<script>
			isotope = function() {
        jQuery('.pt-masonry').isotope({
            itemSelector: '.pt-masonry-item',
            // layoutMode: 'masonry',
            layoutMode: 'fitRows',
            masonry: {
                columnWidth: '.grid-sizer',
                isFitWidth: true,
                percentPosition: true,
                }
            });
        jQuery('.pt-grid').isotope({
            itemSelector: '.pt-grid-item',
        });
        jQuery('.pt-filter-button-group').on('click', '.pt-filter-btn', function() {
            var filterValue = jQuery(this).attr('data-filter');
            console.log(filterValue);
            jQuery('.pt-masonry').isotope({ filter: filterValue });
            jQuery('.pt-grid').isotope({ filter: filterValue });
            jQuery('.pt-filter-button-group .pt-filter-btn').removeClass('active');
            jQuery(this).addClass('active');
            updateFilterCounts();
        });
        var initial_items = 5;
        var next_items = 3;
        if (jQuery('.pt-masonry').length > 0) {
            var initial_items = jQuery('.pt-masonry').data('initial_items');
            var next_items = jQuery('.pt-masonry').data('next_items');
        }
        if (jQuery('.pt-grid').length > 0) {
            var initial_items = jQuery('.pt-grid').data('initial_items');
            var next_items = jQuery('.pt-grid').data('next_items');
        }
        function showNextItems(pagination) {
            var itemsMax = jQuery('.visible_item').length;
            var itemsCount = 0;
            jQuery('.visible_item').each(function() {
                if (itemsCount < pagination) {
                    jQuery(this).removeClass('visible_item');
                    itemsCount++;
                }
            });
            if (itemsCount >= itemsMax) {
                jQuery('#showMore').hide();
            }
            if (jQuery('.pt-masonry').length > 0) {
                jQuery('.pt-masonry').isotope('layout');
            }
            if (jQuery('.pt-grid').length > 0) {
                jQuery('.pt-grid').isotope('layout');
            }
        }
            // function that hides items when page is loaded
            function hideItems(pagination) {
                var itemsMax = jQuery('.pt-filter-items').length;
                // console.log(itemsMax);
                var itemsCount = 0;
                jQuery('.pt-filter-items').each(function() {
                    if (itemsCount >= pagination) {
                        jQuery(this).addClass('visible_item');
                    }
                    itemsCount++;
                });
                if (itemsCount < itemsMax || initial_items >= itemsMax) {
                    jQuery('#showMore').hide();
                }
                if (jQuery('.pt-masonry').length > 0) {
                    jQuery('.pt-masonry').isotope('layout');
                }
                if (jQuery('.pt-grid').length > 0) {
                    jQuery('.pt-grid').isotope('layout');
                }
            }
            jQuery('#showMore').on('click', function(e) {
                e.preventDefault();
                showNextItems(next_items);
            });
            hideItems(initial_items);
            function updateFilterCounts() {
                // get filtered item elements
                if (jQuery('.pt-masonry').length > 0) {
                    var itemElems = jQuery('.pt-masonry').isotope('getFilteredItemElements');
                }
                if (jQuery('.pt-grid').length > 0) {
                    var itemElems = jQuery('.pt-grid').isotope('getFilteredItemElements');
                }
                var count_items = jQuery(itemElems).length;
                // console.log(count_items);
                if (count_items > initial_items) {
                    jQuery('#showMore').show();
                } else {
                    jQuery('#showMore').hide();
                }
                if (jQuery('.pt-filter-items').hasClass('visible_item')) {
                    jQuery('.pt-filter-items').removeClass('visible_item');
                }
                var index = 0;
                jQuery(itemElems).each(function() {
                    if (index >= initial_items) {
                        jQuery(this).addClass('visible_item');
                    }
                    index++;
                });
                if (jQuery('.pt-masonry').length > 0) {
                    jQuery('.pt-masonry').isotope('layout');
                }
                if (jQuery('.pt-grid').length > 0) {
                    jQuery('.pt-grid').isotope('layout');
                }
            }
        };
       if (jQuery('.pt-masonry ').length > 0) {
            asyncloader.require(['isotope.pkgd'], function() {
                isotope();
            });
        }
       
		</script>

		<?php endif;
    }

}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Portfolio_Mansory() );