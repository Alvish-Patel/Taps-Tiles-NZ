<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

if($settings['service_style'] == '5' && $settings['service_inner_style'] == 'grid')
{
	if (!empty($settings['description_text'])) 
	{
		$desc_html = $this->parse_text_editor($settings['description_text']);
	} 
	?>
	<div class="pt-service-box pt-style-5  <?php echo $settings['content_align']; ?>">
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
		</div>
		<div class="pt-service-info">
			<div class="pt-service-icon">
				<i class="<?php echo esc_attr($settings['service_icon']['value']); ?>" aria-hidden="true"></i>
			</div>
			<?php 
			$title = sprintf('<%2$s class="pt-service-title"><a %3$s>%1$s</a></%2$s>',$settings['title_text'],$settings['title_tag'], $this->get_render_attribute_string('title_link'));
			echo $title; ?>
			<p><?php echo $desc_html; ?></p>
		</div>
		<?php 
		if ($settings['show_button'] == 'yes') 
		{
			require MARBLEX_CORE_DIR . '/includes/elementor/widgets/button/style.php';
		}
		?>
	</div>
	<?php
}
?>



