<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

$title_html = '';
$desc_html = '';


if($settings['service_style'] == '3' && $settings['service_inner_style'] == 'slider')
{
	$tabs = $this->get_settings_for_display( 'list_items' );

	$slider = new Slider_Controls();
	$slider->add_render_attribute($this ,$settings);

	?>

	<div class="pt-service-box-slider pt-style-3 <?php echo $settings['content_align']; ?>">
		<div class="owl-carousel" <?php echo $this->get_render_attribute_string('slider'); ?>>
			<?php
			foreach($tabs as $key=>$item)
			{
				if ( ! empty( $settings['title_link']['url'] ) ) 
				{
					$this->add_render_attribute( 'btn_attr_link'.$key, 'href', $settings['title_link']['url'] );

					if ( $settings['title_link']['is_external'] ) {
						$this->add_render_attribute( 'btn_attr_link'.$key, 'target', '_blank' );
					}

					if ( ! empty( $settings['title_link']['nofollow'] ) ) {
						$this->add_render_attribute( 'btn_attr_link'.$key, 'rel', 'nofollow' );
					}
				}

				?>
				<div class="item">
					
					<div class="pt-service-box pt-style-3 <?php echo $settings['content_align']; ?>">
						<div class="pt-service-media">
							<div class="pt-service-img">
								<?php 
								if(!empty($item['image']['url']))
									{ ?> 
										<img src="<?php echo esc_url($item['image']['url']); ?>" alt="servicebox">

										<?php   
									} ?>
								</div>
							</div>
							<div class="pt-service-info">
								<?php 
								$title = sprintf('<%2$s class="pt-service-title"><a %3$s>%1$s</a></%2$s>',$item['title_text'],$item['title_tag'],$this->get_render_attribute_string('btn_attr_link'.$key));
								echo $title; ?>
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





