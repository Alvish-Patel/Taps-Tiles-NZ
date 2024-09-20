<?php
namespace Elementor;
if (!defined('ABSPATH')) {
	exit;
}

$settings = $this->get_settings();

if($settings['service_style'] == '2' && $settings['service_inner_style'] == 'grid')
{
	if (!empty($settings['description_text'])) 
	{
		$desc_html = $this->parse_text_editor($settings['description_text']);
	} 
	?>
	<div class="pt-service-box pt-style-2 <?php echo $settings['content_align']; ?>">					
		<div class="pt-service-info">
			<div class="pt-service-content">
				<div class="pt-service-number">
					<?php echo esc_html($settings['service_number']); ?>
				</div>
				<?php 
				$title = sprintf('<%2$s class="pt-service-title">%1$s</%2$s>',$settings['title_text'],$settings['title_tag']);
				echo $title; ?>
			</div>
			<div class="pt-service-description">
				<p><?php echo $desc_html; ?></p>
			</div>
			<?php
			if ($settings['show_button'] == 'yes') 
			{
				require MARBLEX_CORE_DIR . '/includes/elementor/widgets/button/style.php';
			}
			?>
		</div>
	</div>
	<?php
}
?>



