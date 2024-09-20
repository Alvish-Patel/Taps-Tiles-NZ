<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

if ( ! empty( $settings['title_link']['url'] ) ) 
{
	$this->add_render_attribute( 'btn_attr_link', 'href', $settings['title_link']['url'] );

	if ( $settings['title_link']['is_external'] ) {
		$this->add_render_attribute( 'btn_attr_link', 'target', '_blank' );
	}

	if ( ! empty( $settings['title_link']['nofollow'] ) ) {
		$this->add_render_attribute( 'btn_attr_link', 'rel', 'nofollow' );
	}
}


if($settings['service_style'] == '3' && $settings['service_inner_style'] == 'grid')
{
	
	?>
	<div class="pt-service-box pt-style-3 <?php echo $settings['content_align']; ?>">
		<div class="pt-service-media">
			<div class="pt-service-img">
				<?php 
				if(!empty($settings['image']['url']))
					{ ?> 
						<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="servicebox">

					<?php   
					 } ?>
				</div>
			</div>
			<div class="pt-service-info">
				<?php 
				$title = sprintf('<%2$s class="pt-service-title"><a %3$s>%1$s</a></%2$s>',$settings['title_text'],$settings['title_tag'],$this->get_render_attribute_string('btn_attr_link'));
				echo $title; ?>
			</div>
		</div>
		<?php
	}
	?>



