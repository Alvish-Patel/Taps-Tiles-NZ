<?php
function marblex_footer_logo() {
	register_widget( 'Pt_Footer_Logo' );
}
add_action( 'widgets_init', 'marblex_footer_logo' );

/*-------------------------------------------
		marblex Contact Information widget
		--------------------------------------------*/
		class Pt_Footer_Logo extends WP_Widget {

			function __construct() {
				parent::__construct(

			// Base ID of your widget
					'Pt_Footer_Logo',

			// Widget name will appear in UI
					esc_html('Footer Logo', 'marblex'),

			// Widget description
					array( 'description' => esc_html( 'Footer Logo. ', 'marblex' ), )
				);
			}

	// Creating widget front-end

			public function widget( $args, $instance ) {

				global $wp_registered_sidebars;
				$pqf_options = get_option('pqf_options');




				if ( ! isset( $args['widget_id'] ) ) {
					$args['widget_id'] = $this->id;
				}

				$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : false;

				/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
				$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

				$footer_about = isset( $instance['footer_about'] ) ? $instance['footer_about'] : false;


				if(!empty($pqf_options['logo_footer']['url']))
				{
					$logo = $pqf_options['logo_footer']['url'];
				}

				/* here add extra display item  */
				?>
				<div class="widget">
					<?php if ( $title ) {
						echo ($args['before_title'] . $title . $args['after_title']);
					} ?>
					<?php
						if($footer_about)
						{
							?>
							<p><?php echo esc_html($footer_about); ?></p>

						<?php } ?>

						<ul>
						<?php
						if(!empty($pqf_options['phone']))
						{
							?>

							<li>
								<a href="tel:<?php echo str_replace(str_split('(),-" '), '',$pqf_options['phone']); ?>"><i class="fas fa-phone"></i>
									<span><?php echo esc_html($pqf_options['phone']); ?></span>
								</a>
							</li>
						<?php } ?>
					 </ul>
					</div>

					<?php
				}

	// Widget Backend
				public function form( $instance ) {
					$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

					$footer_about = isset( $instance['footer_about'] ) ? esc_html($instance['footer_about'])  : false;
					?>

					<p><label for="<?php echo esc_html($this->get_field_id( 'title','marblex' )); ?>"><?php esc_html_e( 'Title:','marblex' ); ?></label>
						<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title','marblex' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title','marblex')); ?>" type="text" value="<?php echo esc_html($title,'marblex'); ?>" /></p>

						<p>
							<textarea class="widefat" id="<?php echo esc_html($this->get_field_id( 'footer_about','marblex' )); ?>" name="<?php echo esc_html($this->get_field_name( 'footer_about','marblex')); ?>" placeholder="<?php esc_attr__('Enter description text here' , 'marblex') ?>"><?php echo esc_html($footer_about); ?></textarea>
						</p>

						<?php
					}

	// Updating widget replacing old instances with new
					public function update( $new_instance, $old_instance ) {
						$instance = array();
						$instance['title'] = sanitize_text_field( $new_instance['title'] );
						$instance['footer_about'] = sanitize_text_field( $new_instance['footer_about'] );

						return $instance;
					}
				}
/*---------------------------------------
		Class wpb_widget ends here
		----------------------------------------*/
