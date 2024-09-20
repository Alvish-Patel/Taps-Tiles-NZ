<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

if($settings['service_style'] == '1' && $settings['service_inner_style'] == 'grid')
{
	if (!empty($settings['description_text'])) 
	{
		$desc_html = $this->parse_text_editor($settings['description_text']);
	}

	if ( ! empty( $settings['title_link']['url'] ) ) 
	{
		$this->add_render_attribute( 'title_link', 'href', $settings['title_link']['url'] );
		if ( $settings['title_link']['is_external'] ) {
			$this->add_render_attribute( 'title_link', 'target', '_blank' );
		}
		if ( ! empty( $settings['title_link']['nofollow'] ) ) {
			$this->add_render_attribute( 'title_link', 'rel', 'nofollow' );
		}
	}
	?>  
?>
<div class="pt-service-box pt-style-1 <?php echo $settings['content_align']; ?>">					
	<div class="pt-service-media">
		<?php 
		if(!empty($settings['image']['url']))
		{
			?>
			<div class="pt-service-img">

				<img src="<?php echo esc_url($settings['image']['url']); ?>" alt="service-img">

			</div>
			<?php 
		}	
		?>
		<div class="pt-service-icon">
			<i class="<?php echo esc_attr($settings['service_icon']['value']); ?>" aria-hidden="true"></i>
		</div>

	</div>
	<div class="pt-service-info">
		<?php 
		$title = sprintf('<%2$s class="pt-service-title"><a %3$s>%1$s</a></%2$s>',$settings['title_text'],$settings['title_tag'], $this->get_render_attribute_string('title_link'));
		echo $title; ?>
		<div class="pt-service-number">
			<?php echo esc_html($settings['service_number']); ?>
		</div>
		<div class="pt-service-description">
			<p><?php echo $desc_html; ?></p>
		</div>
	</div>
</div>
<?php
}
?>

