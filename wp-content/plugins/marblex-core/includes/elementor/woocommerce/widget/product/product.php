<?php
namespace Elementor; 
use Marblex\Elementor_widgets\Marblex_Elementor_Init as SCEW;
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Elementor Blog widget.
 *
 * Elementor widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class woo_Pt_PRoduct_Grid extends Widget_Base {
	/**
	 * Get widget name.
	 *
	 * Retrieve heading widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return __( 'woo_ft_Product_grid', 'marblex-core' );
	}
	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Woccommerece Product Grid', 'marblex-core' );
	}
	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 2.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	// public function get_categories() {
	// 	return [ SCEW::get_woo_category() ];
	// }
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
		return 'eicon-slider-push';
	}
	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_blog',
			[
				'label' => __( 'Product Grid', 'marblex-core' ),
			]
		);
		$this->add_control(
			'pt_product_type',
			[
				'label'      => __( 'Select Product', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'default'    => 'products',
				'options'    => [
					'featured_products' => __( 'Feature Product', 'marblex-core' ),
					'recent_products' => __( 'Recent Product', 'marblex-core' ),
					'sale_products'   => __( 'Sale Product', 'marblex-core' ),
					'best_selling_products' => __( 'Best Selling Product', 'marblex-core' ),
					'top_rated_products'    => __( 'Top Rated Product', 'marblex-core' ),
					'products'          => __( 'All Products', 'marblex-core' ),
				],
			]
		);
        $this->add_control(
			'pt_woo_column',
			[
				'label'      => __( 'Column', 'marblex-core' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => [
					'1'          => __( '1 Columns', 'marblex-core' ),
					'2'          => __( '2 Columns', 'marblex-core' ),
					'3'          => __( '3 Columns', 'marblex-core' ),
					'4'          => __( '4 Columns', 'marblex-core' ),
					'5'          => __( '5 Columns', 'marblex-core' ),
					'6'          => __( '6 Columns', 'marblex-core' ),
				],
				'default'    => '1',
			]
		);
		$this->add_control(
			'pt_pt_woo_order_by',
			[
				'label'   => __( 'Order By', 'marblex-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'rand',
				'options' => [
						'none' => esc_html__('None', 'marblex-core'),
						'rand' => esc_html__('Random', 'marblex-core'),
						'date' => esc_html__('Date', 'marblex-core'),
						'menu_order' => esc_html__('Menu Order', 'marblex-core'),
						'popularity' => esc_html__('Popularity', 'marblex-core'),
						'rating' => esc_html__('Rating', 'marblex-core'),
						'title' => esc_html__('Title', 'marblex-core'),
				],
			]
		);
		$this->add_control(
			'pt_woo_order',
			[
				'label'   => __( 'Order', 'marblex-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
						'DESC' => esc_html__('Descending', 'marblex-core'),
						'ASC' => esc_html__('Ascending', 'marblex-core')
				],
			]
		);
		$this->add_control(
			'pt_woo_per_page',
			[
				'label' => __( 'Per Page', 'marblex-core' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 10,
			]
		);
		$this->add_control(
			'pt_show_pagination',
			[
				'label' => __( 'Show Pagination', 'marblex-core' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'marblex-core' ),
				'label_off' => __( 'Hide', 'marblex-core' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$array = [];
		$categories = pt_woo_get_category();
		if ( ! empty( $categories ) ) {
  			foreach ( $categories as $cat ) {
    			$array[$cat->slug] = $cat->slug;
  			}
		}
		$this->add_control(
			'pt_woo_category',
			[
				'label' => __( 'Display Product From Specific Categoy', 'marblex-core' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $array,
			]
		);
		$this->add_control(
			'pt_cat_operator',
			[
				'label'   => __( 'Categoy Operator', 'marblex-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'IN',
				'options' => [
						'AND' => esc_html__('AND', 'marblex-core'),
						'IN' => esc_html__('IN', 'marblex-core'),
						'NOT IN' => esc_html__('NOT IN', 'marblex-core'),
				],
			]
		);
		$this->add_control(
			'pt_woo_tag',
			[
				'label' => __( 'Display Product From Specific Tag', 'marblex-core' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => pt_woo_product_tags(),
			]
		);
		$this->add_control(
			'pt_tag_operator',
			[
				'label'   => __( 'Tag Operator', 'marblex-core' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'IN',
				'options' => [
						'AND' => esc_html__('AND', 'marblex-core'),
						'IN' => esc_html__('IN', 'marblex-core'),
						'NOT IN' => esc_html__('NOT IN', 'marblex-core'),
				],
			]
		);
        $this->end_controls_section();
	}
	/**
	 * Render Blog widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		require plugin_dir_path( __FILE__ ) . '/render.php';
		if ( Plugin::$instance->editor->is_edit_mode() ) :
		?>
		<?php endif;
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\woo_Pt_PRoduct_Grid() );
