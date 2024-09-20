<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

$title_html = '';
$desc_html = '';


if($settings['service_style'] == '1' && $settings['service_inner_style'] == 'slider')
{
	$tabs = $this->get_settings_for_display( 'list_items' );

	$slider = new Slider_Controls();
	$slider->add_render_attribute($this ,$settings);

	?>

	<div class="pt-service-box-slider pt-style-1 <?php echo $settings['content_align']; ?>">
		<div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>
			<?php
			foreach($tabs as $key=>$item)
			{
				if (!empty($item['description_text'])) 
				{
					$desc_html = $this->parse_text_editor($item['description_text']);
				} 
				if ( ! empty( $settings['title_link']['url'] ) ) 
				{
					$this->add_render_attribute( 'title_link'.$key, 'href', $settings['title_link']['url'] );
					if ( $settings['title_link']['is_external'] ) {
						$this->add_render_attribute( 'title_link'.$key, 'target', '_blank' );
					}
					if ( ! empty( $settings['title_link']['nofollow'] ) ) {
						$this->add_render_attribute( 'title_link'.$key, 'rel', 'nofollow' );
					}
				}
				?>
				<div class="item">
					
					<div class="pt-service-box pt-style-1 <?php echo $settings['content_align']; ?>">					
						<div class="pt-service-media">
							<?php 
							if(!empty($item['image']['url']))
							{
								?>
								<div class="pt-service-img">
									<img src="<?php echo esc_url($item['image']['url']); ?>" alt="service-img">

								</div>
								<?php 
							}	
							?>
							<div class="pt-service-icon">
								<i class="<?php echo esc_attr($item['service_icon']['value']); ?>" aria-hidden="true"></i>
							</div>

						</div>
						<div class="pt-service-info">
							<?php 
							$title = sprintf('<%2$s class="pt-service-title"><a %3$s>%1$s</a></%2$s>',$item['title_text'],$item['title_tag'],$this->get_render_attribute_string('title_link'.$key));
							echo $title; ?>
							<div class="pt-service-number">
								<?php echo esc_html($item['service_number']); ?>
							</div>
							<div class="pt-service-description">
								<p><?php echo $desc_html; ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php 
}
?>





